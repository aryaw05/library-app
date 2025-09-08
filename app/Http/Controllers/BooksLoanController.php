<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use Illuminate\Http\Request;

class BooksLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $search = $request->query('search');

    $books = BookLoan::with(['book', 'student'])
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                    
                $q->whereHas('book', function ($bookQuery) use ($search) {
                    $bookQuery->where('title', 'like', "%{$search}%");
                })
                // 🔎 Atau berdasarkan nama student
                ->orWhereHas('student', function ($studentQuery) use ($search) {
                    $studentQuery->where('name', 'like', "%{$search}%");
                });
            });
        })
        ->orderByDesc('loan_date')
        ->paginate(10);
        return view('dashboard.books_loan.books-loan', compact('books' , 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
