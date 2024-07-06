<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternative::orderBy('created_at', 'DESC')->get();

        return view('alternative.index', compact('alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternative.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Alternative::create($request->all());

        return redirect()->route('alternative')->with('success', 'Product added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alternatif = Alternative::findOrFail($id);

        return view('alternative.show', compact('alternatif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
