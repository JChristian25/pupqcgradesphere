<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectCurriculum extends Model
{
    protected $fillable = [
        'cur_subject_code',
        'cur_subject_year',
        'cur_subject_semester',
        'cur_subject_description',
        'cur_subject_units',
        'curriculum_id'
    ];
}
