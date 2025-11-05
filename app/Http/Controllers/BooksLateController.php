<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use Illuminate\Http\Request;

class BooksLateController extends Controller
{
    public function index( Request $request){
    $search = $request->query('search');

    $loans = BookLoan::with(['book', 'student'])
        ->whereIn('status', ['returned_late'])
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
        ->orderByDesc('created_at')
        ->paginate(10);

    return view('dashboard.books_late.index', compact('loans', 'search'));
    }
}
