<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'student_number',
        'student_fname',
        'student_mname',
        'student_lname',
        'student_program',
        'student_curriculum',
        'student_suffix',
        'has_hscard',
        'has_birthcert',
        'has_f137',
        'honorable_dismissal',
        'with_tor',
        'with_diploma',
    ];
}
