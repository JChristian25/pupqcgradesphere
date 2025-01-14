<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'course_code',
        'course_description'
    ];
}
