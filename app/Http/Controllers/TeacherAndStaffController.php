<?php

namespace App\Http\Controllers;

use App\Models\TeacherAndStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherAndStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $search  = $request->query('search');
        
        $teachers = TeacherAndStaff::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->orderBy('name', 'asc')->paginate(10);

        return view('dashboard.teacher.index', compact('teachers' , 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.teacher.partials.add-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'name'=> 'required|max:255',
                'position'=> 'required|max:50',
                'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                 'order' => 'required|integer',
            ]);

            $path = $request->file('photo')->store('teacher/photo', 'public');
            
            TeacherAndStaff::create([
                'name'=> $request->name,
                'position'=> $request->position,
                'photo'=> $path,
                'order'=> $request->order,
            ]);

        
             return redirect()->route('teacher-and-staff.index')->with('success', 'Data Profile berhasil ditambahkan.');
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
       $teacher = TeacherAndStaff::findOrFail($id);
        return view('dashboard.teacher.partials.update-form', compact('teacher'));
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
    public function destroy(TeacherAndStaff $teacherAndStaff)
    {
        if($teacherAndStaff->photo){
            Storage::disk('public')->delete($teacherAndStaff->photo);
        }
        $teacher = TeacherAndStaff::findOrFail($teacherAndStaff->id);

        $teacher->delete();

        return redirect()->back()->with('success','Data Profile berhasil dihapus');
    }
}
