<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gradesheet extends Model
{
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'g_status',
        'g_subject', // DONE
        'g_subject_code',   
        'g_subject_semester', // DONE
        'g_subject_units', // Done
        'g_course_code', 
        'g_course_description',
        'year_and_section', // DONE
        'block_time', // DONE
        'block_room', // DONE
        'school_year' 
    ];
}
