<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Gradesheet;
use App\Models\StudentGradesheet;

class GradesheetController extends Controller
{
    public function index() {

        $gradesheets = Gradesheet::all();

        return view('gradesheet.gradesheet', compact('gradesheets'));

    }

    public function add() {
        $students = Student::all();
        $subjects = Subject::all();

        return view('gradesheet.add', compact('students','subjects'));
    }

    public function destroy($id)
    {
        $gradesheet = Gradesheet::findOrFail($id);
        $gradesheet->delete();

        return response()->json(['success' => 'Student deleted successfully.']);
    }

    public function show($id)
    {
        $gradesheet = Gradesheet::findOrFail($id);

        $studentGradesheet = StudentGradesheet::join('students', 'students.id', '=', 'student_gradesheet.student_id')
            ->where('student_gradesheet.gradesheet_id', $id)
            ->orderBy('students.student_lname', 'asc')
            ->get(['student_gradesheet.*', 'students.*']);

        return view('gradesheet.view', compact('gradesheet', 'studentGradesheet'));
    }

    public function edit($id)
    {
        $gradesheet = Gradesheet::findOrFail($id);

        if ($gradesheet->g_status != "Unfinished") {
            return redirect()->route('gradesheets');
        }

        $studentGradesheet = StudentGradesheet::join('students', 'students.id', '=', 'student_gradesheet.student_id')
            ->where('student_gradesheet.gradesheet_id', $id)
            ->orderBy('students.student_lname', 'asc')
            ->get(['student_gradesheet.*', 'students.*']);

        return view('gradesheet.edit', compact('gradesheet', 'studentGradesheet'));
    }

    public function store(Request $request)
    {
        // Create the Gradesheet record
        $gradesheet = Gradesheet::create([
            'g_subject' => $request->input('g_subject'),
            'g_subject_code' => $request->input('subject_code'),
            'year_and_section' => $request->input('year_and_section'),
            'block_time' => $request->input('block_time'),
            'block_room' => $request->input('block_room'),
            'g_subject_units' => $request->input('g_subject_units'),
            'g_subject_semester' => $request->input('g_subject_semester'),
            'school_year' => $request->input('school_year'),
            'g_status' => $request->input('g_status'),
        ]);

        if ($gradesheet) {
            // Parse students JSON string to an array
            $students = json_decode($request->input('students'), true);

            foreach ($students as $student) {
                // Initialize final grade and remarks
                $finalGrade = $student['finalGrade'];
                $remarks = $student['remarks'];

                // Adjustments for INC, W, and D logic
                if (in_array($remarks, ['INC', 'W', 'D'])) {
                    $finalGrade = $remarks; // Use the remark directly as the grade
                } else if ($remarks === 'INC' && is_numeric($student['finalGrade'])) {
                    if ($student['finalGrade'] < 3.00) {
                        $finalGrade = $student['finalGrade'] . "/INC"; // Append INC to numeric grade
                        $remarks = "Passed";
                    } else {
                        $remarks = "Failed";
                    }
                }

                // Save the student grades
                StudentGradesheet::create([
                    'student_id' => $student['id'],
                    'gradesheet_id' => $gradesheet->id,
                    'first_grading' => $student['firstGrade'],
                    'second_grading' => $student['secondGrade'],
                    'final_rating' => $finalGrade,
                    'remarks' => $remarks,
                ]);
            }
        } else {
            // Return an error response
            return response()->json(['message' => 'Error in saving gradesheet'], 500);
        }

        // Return a success response
        return response()->json(['message' => 'Gradesheet saved successfully']);
    }

    public function update(Request $request)
    {
        $id = $request->input('gradesheetId');

        // Find the existing Gradesheet record
        $gradesheet = Gradesheet::find($id);

        // Check if the gradesheet was found
        if (!$gradesheet) {
            return response()->json(['message' => 'Gradesheet not found'], 404);
        }

        // Update the Gradesheet record
        $gradesheet->update([
            'g_subject' => $request->input('g_subject'),
            'g_subject_code' => $request->input('subject_code'),
            'year_and_section' => $request->input('year_and_section'),
            'block_time' => $request->input('block_time'),
            'block_room' => $request->input('block_room'),
            'g_subject_units' => $request->input('g_subject_units'),
            'g_subject_semester' => $request->input('g_subject_semester'),
            'school_year' => $request->input('school_year'),
            'g_status' => $request->input('g_status'),
        ]);

        // Parse students JSON string to an array
        $students = $request->input('students');  // No need to json_decode since we're sending JSON already

        foreach ($students as $student) {
            // Find the existing StudentGradesheet record
            $studentGradesheet = StudentGradesheet::where('student_id', $student['id'])
                ->where('gradesheet_id', $gradesheet->id)
                ->first();

            // Initialize final grade and remarks
            $finalGrade = $student['finalGrade'];
            $remarks = $student['remarks'];

            // Adjustments for INC, W, and D logic
            if (in_array($remarks, ['W', 'D'])) {
                $finalGrade = $remarks;
            } else if ($remarks === 'INC' && is_numeric($student['finalGrade'])) {
                if ($student['finalGrade'] < 3.00) {
                    $finalGrade = $student['finalGrade'] . "/INC";
                    $remarks = "Passed";
                } else {
                    $finalGrade = "INC";
                    $remarks = "Failed";
                }
            }


            // Update or create the student grades
            if ($studentGradesheet) {
                // Update existing record
                $studentGradesheet->update([
                    'first_grading' => $student['firstGrade'],
                    'second_grading' => $student['secondGrade'],
                    'final_rating' => $finalGrade,
                    'remarks' => $remarks,
                ]);
            } else {
                // Create a new record if it doesn't exist
                StudentGradesheet::create([
                    'student_id' => $student['id'],
                    'gradesheet_id' => $gradesheet->id,
                    'first_grading' => $student['firstGrade'],
                    'second_grading' => $student['secondGrade'],
                    'final_rating' => $finalGrade,
                    'remarks' => $remarks,
                ]);
            }
        }

        // Return a success response
        return response()->json(['message' => 'Gradesheet updated successfully']);
    }

    public function generatepdf($id)
    {
        $gradesheet = Gradesheet::findOrFail($id);

        $studentGradesheet = StudentGradesheet::join('students', 'students.id', '=', 'student_gradesheet.student_id')
            ->where('student_gradesheet.gradesheet_id', $id)
            ->orderBy('students.student_lname', 'asc')
            ->get(['student_gradesheet.*', 'students.*']);

        $data = [
            'gradesheet' => $gradesheet,
            'studentGradesheet' => $studentGradesheet,
        ];

        $pdf = Pdf::loadView('pdf.gradesheet', $data);

        return $pdf->download('student_gradesheet.pdf');
    }
}
