<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = Kriteria::orderby('kode_kriteria', 'asc')->get();
        return view('admin.kriteria.index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $this->validate($request, [
            'kode_kriteria' => 'required|string',
            'nama_kriteria' => 'required|string',
            'bobot_kriteria' => 'required|numeric',
            'type' => 'required|string',
        ]);
        $kriteria = Kriteria::create([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
            'type' => $request->type,
        ]);
    
        // dd($validatedData);
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data kriteria berhasil ditambahkan');
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
        $kriteria = Kriteria::findOrFail($id);
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kode_kriteria' => 'required|string',
            'nama_kriteria' => 'required|string',
            'bobot_kriteria' => 'required|numeric',
            'type' => 'required|string',
        ]);
    
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
            'type' => $request->type,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil diupdate');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kriteria::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data kriteria berhasil dihapus');
    }
}
