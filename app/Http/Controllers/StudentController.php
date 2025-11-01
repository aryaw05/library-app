<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search  =$request->query('search');
        
       $students = Student::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
        })->orderBy('class', 'asc')->paginate(10);

        return view('dashboard.students.students', compact('students' , 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('students.create-student');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis|max:20',
            'name' => 'required|max:100',
            'class' => 'required|max:50',
            'address' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|max:20',
            'gender' => 'nullable|string|max:10',
            'birth_date' => 'nullable|date',

        ]);

        Student::create($request->all());

        return redirect()->back()
            ->with('success', 'Data siswa berhasil ditambahkan.');
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
        //  $student = Student::findOrFail($id);
        // return view('dashboard.students.partials.update-form', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
         $request->validate([
            'nis' => 'required|max:20|unique:students,nis,' . $student->id,
            'name' => 'required|max:100',
            'class' => 'required|max:50',
            'gender' => 'nullable|string|max:10',
            'address' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|max:20',
            'birth_date' => 'nullable|date',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->back()
            ->with('success', 'Data siswa berhasil dihapus.');
    }

   public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,csv,xls',
    ]);

    $import = new StudentsImport();
    Excel::import($import, $request->file('file'));

    // $rows = Excel::toCollection(new StudentsImport, $request->file('file'));
    // dd($rows);

    $failures = $import->failures();
    $totalFailed = $failures->count();

    $messages = [];
    foreach ($failures as $failure) {
        $messages[] = "❌ Baris {$failure->row()} - Kolom: {$failure->attribute()} → " . implode(', ', $failure->errors());
    }

    if ($totalFailed > 0) {
        return back()->withErrors($messages)
                     ->with('success', 'Sebagian data berhasil diimport. ' . $totalFailed . ' baris gagal diproses.');
    }

    return back()->with('success', '✅ Semua data siswa berhasil diimport tanpa error.');
}



    public function export()
    {
        return Excel::download(new StudentsExport, 'Data_siswa.xlsx');
    }
}
