<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
      protected $fillable = [
        'nis',
        'name',
        'class',
        'gender',
        'birth_date',
        'address',
        'phone',
        'email',
    ];
}
