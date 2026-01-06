<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtracurricularsAchievements extends Model
{
    protected $fillable = [
        "extracurricular_id",
        "title",
        "level",
        "year",
        "description",
    ];

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class);
    }
}
