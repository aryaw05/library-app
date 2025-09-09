<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    protected $fillable = [
        'book_id',
        'student_id',
        'loan_date',
        'return_date',
        'due_date',
        'status',

        
    ];

     protected $attributes = [
        'status' => 'borrowed',
    ];


    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
