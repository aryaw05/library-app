<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BooksLateController;
use App\Http\Controllers\BooksLoanController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard' ,[OverviewController::class,  'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth' , 'verified')->group(function () {

    // auth routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // student routes
    Route::resource('students', StudentController::class);


    // books routes
    Route::resource('books', BooksController::class);

    // import students
    Route::post('/students/import' , [StudentController::class, 'import'])->name('students.import');



    // books loan routes  
    Route::resource('books-loan', BooksLoanController::class);
    Route::get('/export-books-loan', [BooksLoanController::class, 'export'])->name('loans.export');





    // books loan return routes
    Route::put('/books-loan/{books_loan}/return', [BooksLoanController::class, 'return'])->name('books-loan.return');
});
    // books late
Route::get('/books-late' , [BooksLateController::class, 'index'])->name('books-late');



    // exports
    Route::get('/export-books', [BooksController::class, 'export'])->name('books.export');
    Route::get('/export-students', [StudentController::class, 'export'])->name('students.export');
    Route::get('/export-visitors', [BooksLoanController::class, 'visitorsExport'])->name('visitors.export');
    Route::get('/export-late', [BooksLoanController::class, 'lateExport'])->name('late.export');


    // reports
    // Route::get('/dashboard/reports' , [OverviewController::class, 'reports'])->name('reports');

    // tutorial
    Route::get('/tutorial' , [OverviewController::class, 'tutorial'])->name('tutorial');


require __DIR__.'/auth.php';
