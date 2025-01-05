<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CurriculumImport;
use App\Models\Curriculum;
use App\Models\SubjectCurriculum;
use Excel;

class CurriculumController extends Controller
{
    public function index(){
        $curriculum = Curriculum::all();

        return view('configuration.curriculum', compact('curriculum'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new CurriculumImport, $request->file('file'));

        return redirect()->back()->with('success', 'Curriculum imported successfully.');
    }

    public function show($id)
    {
        // $curriculum = Curriculum::findOrFail($id);

        // $subjectCurriculum = SubjectCurriculum::join('students', 'students.id', '=', 'student_gradesheet.student_id')
        //     ->where('student_gradesheet.gradesheet_id', $id)
        //     ->orderBy('students.student_lname', 'asc')
        //     ->get(['student_gradesheet.*', 'students.*']);

        // return view('gradesheet.view', compact('gradesheet', 'studentGradesheet'));
    }

    public function store(Request $request)
    {
        // Create the Gradesheet record
        $curriculum = Curriculum::create([
            'curriculum_name' => $request->input('curriculum_name'),
            'curriculum_year' => $request->input('curriculum_year'),
        ]);

        if ($curriculum) {
            // Parse students JSON string to an array
            $subjects = json_decode($request->input('subjects'), true);

            foreach ($subjects as $subject) {

                SubjectCurriculum::create([
                    'cur_subject_code' => $subjects['subject_code'],
                    'cur_subject_year' => $subjects['subject_year'],
                    'cur_subject_semester' => $subjects['subject_semester'],
                    'cur_subject_description' => $subjects['subject_description'],
                    'cur_subject_units' => $subjects['subject_units'],
                    'curriculum_id' => $curriculum->id,
                ]);
            }
        } else {
            // Return an error response
            return response()->json(['message' => 'Error in saving gradesheet'], 500);
        }

        // Return a success response
        return response()->json(['message' => 'Gradesheet saved successfully']);
    }
}
