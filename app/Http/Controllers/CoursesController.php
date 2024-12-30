<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CoursesController extends Controller
{
    public function index(){
        $courses = Course::all();

        return view('configuration.courses', compact('courses'));
    }

    public function add(){
        return view('configuration.courses.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_code' => 'required|string|max:255',
            'course_description' => 'required|string|max:255',
        ]);

        $course = Course::create($validatedData);

        return redirect()->route('courses')->with('success', 'Course record created successfully!');
    }
}
