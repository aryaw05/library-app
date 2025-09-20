<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use App\Models\Books;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search  = $request->query('search');
        
       $books = Books::when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
        })->orderBy('title', 'asc')->paginate(10);

        return view('dashboard.books.books', compact('books' , 'search'));
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
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'nullable|integer|min:0',
            'stock' => 'nullable|integer|min:0',
            'book_code' => 'nullable|unique:books,book_code|max:50',
        ]);

        Books::create($request->all());

        return redirect()->back()
            ->with('success', 'Data buku berhasil ditambahkan.');
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
           
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $book)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'nullable|integer|min:0',
            'stock' => 'nullable|integer|min:0',
            'book_code' => 'nullable|unique:books,book_code,'.$book->id.'|max:50',
        ]);
        $book->update($request->all());

        return redirect()->back()
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    { 
        $book->delete();

        return redirect()->back()
            ->with('success', 'Data buku berhasil dihapus.');
    }


        public function export()
    {
        return Excel::download(new BooksExport, 'Data_buku.xlsx');
    }
}
