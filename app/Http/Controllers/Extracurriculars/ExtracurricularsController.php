<?php

namespace App\Http\Controllers\Extracurriculars;
use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtracurricularsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search  =$request->query('search');
        
        $extracurriculars = Extracurricular::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->orderBy('name', 'asc')->paginate(10);

        return view('dashboard.extracurriculars.index', compact('extracurriculars' , 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.extracurriculars.partials.add-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'description'=> 'required|max:255',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('photo')->store('extracurriculars/cover' , 'public');

        Extracurricular::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'photo'=> $path
        ]);

        return redirect()->route('extracurriculars.index')->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');


    }
    /**
     * Display the specified resource.
     */
    public function show(Extracurricular $extracurricular)
    {
         $achievements = $extracurricular
        ->achievements()
        ->latest()
        ->paginate(10);

    return view(
        'dashboard.extracurriculars.partials.show-form',
        compact('extracurricular', 'achievements')
    );

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricular $extracurricular)
    {
        return view('dashboard.extracurriculars.partials.update-form', compact('extracurricular'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extracurricular $extracurricular)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'description'=> 'required|max:255',
            'photo'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
             

        $data = $request->only(['name' , 'description']);

        if($request->hasFile('photo')){  
            if($extracurricular->photo && Storage::disk('public')->exists($extracurricular->photo)){
                Storage::disk('public')->delete($extracurricular->photo);
            };
            
            $data["photo"] =  $request->file('photo')->store('extracurriculars/cover' , 'public');
        };
            $extracurricular->update($data);


            return redirect()->route('extracurriculars.index')->with('success', 'Data Profile berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $extracurricular)
    {
         if($extracurricular->photo){
            Storage::disk('public')->delete($extracurricular->photo);
        }
        $extracurricular->delete();
        return redirect()->back()->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
