<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $kriteria = Kriteria::orderby('id', 'asc')->get();
        $alternatives = Alternative::orderBy('created_at', 'asc')->get();

        //render view with posts
        return view('admin.alternatif.index', compact('kriteria','alternatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = Kriteria::orderby('id', 'asc')->get();
        return view('admin.alternatif.create',compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_alternative' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
            'C6' => 'required',
        ]);
        $alternatives = alternative::create([
            'nama_alternative' => $request->nama_alternative,
            'C1' => $request->C1,
            'C2' => $request->C2,
            'C3' => $request->C3,
            'C4' => $request->C4,
            'C5' => $request->C5,
            'C6' => $request->C6,
        ]);
        return redirect()->back()->with('success','Data berhasil disimpan');
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
        $alternatives = Alternative::findOrFail($id);
        return view('admin.alternative.edit', compact('alternatives'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_alternative' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
            'C6' => 'required',
        ]);
    
        // Temukan data alternatif berdasarkan ID
        $alternatives = Alternative::findOrFail($id);
    
        // Update data alternatif
        $alternatives->update([
            'nama_alternative' => $request->nama_alternative,
            'C1' => $request->C1,
            'C2' => $request->C2,
            'C3' => $request->C3,
            'C4' => $request->C4,
            'C5' => $request->C5,
            'C6' => $request->C6,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('alternative.index')->with('success', 'Data berhasil diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Alternative::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data alternative berhasil dihapus');
    }
}
