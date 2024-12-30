<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'curriculum_name',
        'curriculum_year',
        'cur_subject_code',
        'cur_subject_semester',
        'cur_subject_description',
        'cur_subject_units',
    ];
}
