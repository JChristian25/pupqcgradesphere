<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentGradesheet extends Model
{
    protected $table = 'student_gradesheet';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'gradesheet_id',
        'student_id',
        'first_grading',
        'second_grading',
        'final_rating',
        'remarks',
    ];
}
