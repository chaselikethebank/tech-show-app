<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matrices = Matrix::all();
        return view('matrices.index', compact('matrices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matrices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-validate([
            'item' => 'required|string', 

        ]);

        Matrix::create($request->only('item'));

        return redirect()->route('matrix.index')->with('success', 'Matrix stored successfully.');
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
