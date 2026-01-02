<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtracurricularsAchievement extends Model
{
    protected $fillable = [
        "extracurriculars_id",
        "title",
        "level",
        "year",
        "description",
    ];
}
