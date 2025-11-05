<?php

namespace App\Models;

use Carbon\Carbon;
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
        'late_days',
        'fine',


        
    ];

     protected $attributes = [
        'status' => 'borrowed',
    ];


    public function isReturned(): bool
    {
        return in_array($this->status, ['returned', 'returned_late']);
    
    }



     public function markAsReturned(string $returnDate): void
    {
    
        $returnDateCarbon = Carbon::parse($returnDate);
        $dueDateCarbon = Carbon::parse($this->due_date);


        $isLate = $returnDateCarbon->gt($dueDateCarbon);
        $updateData = [
            'return_date' => $returnDateCarbon,
            'status' => $isLate
                ? 'returned_late'
                : 'returned',
            'late_days' => $isLate ? $dueDateCarbon->diffInDay($returnDateCarbon) : 0,
        ];
        
        $this->update($updateData);
        $book = Books::findOrFail($this->book_id);
        $book->increment('stock');

    }

    
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
