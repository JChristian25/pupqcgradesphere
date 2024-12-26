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

    public function add()
    {
        return view('student.add');
    }
    
    public function store()
    {
        
    }

}
