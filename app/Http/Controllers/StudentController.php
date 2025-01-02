<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\StudentImport;
use App\Models\Student;
use Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('student.student', compact('students'));
    }

    public function importFromXLSX(Request $request)
    {
        $file = $request->file('file'); // Get the uploaded file
        $filePath = $file->getRealPath(); // Get the real path

        // Pass the file path to the import class
        $import = new StudentImport($filePath);
        Excel::import($import, $filePath);

        return back()->with('success', 'File imported successfully.');
    }


    public function add()
    {
        return view('student.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'student_number' => 'required|string|max:255',
            'student_fname'  => 'required|string|max:255',
            'student_mname'  => 'nullable|string|max:255',
            'student_lname'  => 'required|string|max:255',
            'student_suffix' => 'nullable|string|max:255',
            'has_hscard'     => 'nullable|string|max:255',
            'has_birthcert'  => 'required|in:None,Xerox,Original',
            'has_f137'       => 'nullable|in:None,Transferee',
            'honorable_dismissal' => 'nullable|string|max:255',
            'with_tor'       => 'required|in:None,Graduate,Undergraduate',
            'with_diploma'   => 'nullable|string|max:255',
            'student_program'   => 'nullable|string|max:255',
            'student_curriculum'   => 'nullable|string|max:255',
        ]);

        $student = Student::create($validatedData);

        return redirect()->route('students')->with('success', 'Student record created successfully!');
    }

}
