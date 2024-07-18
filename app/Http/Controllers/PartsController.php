<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parts = Part::all();
        return view('parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'part_id' => 'required|string|max:50|unique:parts,part_id', // Ensure uniqueness
            'wholesale_price' => 'required|numeric',
        ]);

        Part::create($request->all());

        return redirect()->route('parts.index')
            ->with('success', 'Part created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $part = Part::findOrFail($id);
        return view('parts.show', compact('part'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $part = Part::findOrFail($id);
        return view('parts.edit', compact('part'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'part_id' => 'required|string|max:50|unique:parts,part_id,' . $id, // Ensure uniqueness, ignoring current id
            'wholesale_price' => 'required|numeric',
        ]);

        $part = Part::findOrFail($id);
        $part->update($request->all());

        return redirect()->route('parts.index')
            ->with('success', 'Part updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $part = Part::findOrFail($id);
        $part->delete();

        return redirect()->route('parts.index')
            ->with('success', 'Part deleted successfully.');
    }
}
