<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectsController extends Controller
{
    public function index(){
        $subjects = Subject::all();

        return view('configuration.subjects', compact('subjects'));
    }

    public function add(){
        return view('configuration.subjects.add');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'subject_code' => 'required|string|max:255',
            'subject_description' => 'required|string|max:255',
            'subject_units' => 'string|max:255'
        ]);

        $subject = Subject::create($validatedData);

        return redirect()->route('subjects')->with('success', 'Subject record created successfully');
    }
}
