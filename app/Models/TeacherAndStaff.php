<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAndStaff extends Model
{
    protected $fillable =[
        'name',
        'category',
        'position',
        'photo',
        'order',
    ] ;
}
