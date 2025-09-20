<?php

namespace App\Http\Controllers;

use App\Exports\BooksLoanExport;
use App\Exports\visitorExport;
use App\Models\BookLoan;
use App\Models\Books;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BooksLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('created_at'  )
            ->paginate(10);

        return view('dashboard.books_loan.books-loan', compact('loans', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::pluck('name', 'id');
        $books = Books::pluck('title', 'id');
        return view ('dashboard.books_loan.partials.add-form' , compact('students' , 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {

            if($request->due_date && $request->due_date < $request->loan_date){
                return redirect()->back()->withErrors(['return_date' => 'Tanggal pengembalian harus setelah atau sama dengan tanggal peminjaman.'])->withInput();
            }

            $validatedData = $request->validate([
                'book_id' => 'required|exists:books,id',
                'student_id' => 'required|exists:students,id',
                'loan_date' => 'required|date',
                'due_date' => 'required|date|after_or_equal:loan_date',
            ]); 

            BookLoan::create($validatedData);


            $book   = Books::findOrFail($validatedData['book_id']);

            if($book->stock <= 0){
                return  redirect()->back()->withErrors( 'Stok buku tidak tersedia.')->withInput();
            }
                
            $book->decrement('stock');

            return redirect()->route('books-loan.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
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
        
        $bookLoan = BookLoan::findOrFail($id);
        return view('dashboard.books_loan.partials.update-form', compact('bookLoan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookLoan $books_loan)
    {

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'student_id' => 'required|exists:students,id',
            'loan_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:loan_date',
        ]);

        $books_loan->update($request->all());

        return redirect()->route('books-loan.index')
            ->with('success', 'Data peminjaman buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookLoan $books_loan )
    {
        $books_loan->delete();
        return redirect()->back()
            ->with('success', 'Data peminjaman buku berhasil dihapus.');
    }


    public function return(Request $request, BookLoan $books_loan)
    {
    if ($books_loan->isReturned()) {
        return redirect()->back()->withErrors(['status' => 'Buku sudah dikembalikan.']);
    }
        $returnDate = $request->input('return_date', Carbon::now());

        $books_loan->markAsReturned($returnDate);

        return redirect()->route('books-loan.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }


    public function export()
    {
        return Excel::download(new BooksLoanExport, 'Peminjaman_buku.xlsx');
    }
    

    public function visitorsExport()
    {
        return Excel::download(new visitorExport, 'Pengunjung.xlsx');
    }
}
