<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;
use App\Models\Gradesheet;
use App\Models\StudentGradesheet;

class GradesheetController extends Controller
{
    public function index() {

        $gradesheets = Gradesheet::all();

        return view('gradesheet.gradesheet', compact('gradesheets'));

    }
}
