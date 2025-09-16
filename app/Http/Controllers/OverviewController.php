<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use App\Models\Books;
use App\Models\Student;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index ( Request $request)
    { 

        // stats counts
        $booksAll = Books::count();
        $booksLoanAll   = BookLoan::where('status', 'borrowed')->count();
        $studentsAll = Student::count();



        // search and pagination
    $search = $request->query('search');

    $loans = BookLoan::with(['book', 'student'])
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('book', function ($bookQuery) use ($search) {
                    $bookQuery->where('title', 'like', "%{$search}%");
                })
                ->orWhereHas('student', function ($studentQuery) use ($search) {
                    $studentQuery->where('name', 'like', "%{$search}%");
                })
                ->orWhere('status', 'like', "%{$search}%");
            });
        })
        ->orderByDesc('created_at'  )
        ->paginate(10);

        return view('dashboard', compact('loans', 'search' , 'booksAll' , 'booksLoanAll' , 'studentsAll'));
    }

}
