<?php

namespace App\Http\Controllers\Extracurriculars;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use App\Models\ExtracurricularsAchievements;
use Illuminate\Http\Request;

class ExtracurricularsAchievementController extends Controller
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

        return view('dashboard.extracurriculars.partials.detail-page', compact('extracurriculars' , 'search'));
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
    public function store(Request $request , Extracurricular $extracurricular)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'level' => 'required|max:255',
            'year' => 'required|date',
            'description' => 'required|string',
        ]);

        $extracurricular->achievements()->create($validated);


        return redirect()->route('extracurriculars.show', $extracurricular->id)
            ->with('success', 'Prestasi ekstrakurikuler berhasil ditambahkan.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ExtracurricularsAchievements $extracurricularsAchievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExtracurricularsAchievements $extracurricularsAchievement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extracurricular $extracurricular,  ExtracurricularsAchievements $achievement)
    {
        $request->validate([
            'title' => 'required|max:255',
            'level' => 'required|max:255',
            'year' => 'required|date',
            'description' => 'required|string',
        ]);

        $achievement->update($request->all());

        return redirect()->route('extracurriculars.show', $extracurricular->id)
            ->with('success', 'Prestasi ekstrakurikuler berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $extracurricular, ExtracurricularsAchievements $achievement)
    {
        $achievement->delete();
        return redirect()->back()->with('success', 'Data prestasi berhasil dihapus.');
    }
}
