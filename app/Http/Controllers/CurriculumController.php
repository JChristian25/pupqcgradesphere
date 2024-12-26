<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index(){
        return view('configuration.curriculum');
    }
}
