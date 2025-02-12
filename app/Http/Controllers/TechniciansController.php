<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechniciansController extends Controller
{
    public function index()
    {
        $technicians = Technician::all();
        return view('technicians.index', compact('technicians'));
    }

    public function create()
    {
        return view('technicians.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:technicians,email',
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);

        Technician::create($data);

        return redirect()->route('technicians.index')->with('success', 'Technician created successfully.');
    }

    public function update(Request $request, Technician $technician)
    {

        // dd($request->all());


        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:techs,email,' . $technician->id,
            'phone' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ]);


        $technician->update($validateData);

        return redirect()->route('technicians.index')->with('success', 'Technician updated successfully.');
    }

    public function show(Tech $technician)
    {
        return view('technicians.show', compact('technician'));
    }

    public function edit(Tech $technician)
    {
        return view('technicians.edit', compact('technician'));
    }

    public function destroy(Techncician $technician)
    {
        $technician->delete();

        return redirect()->route('technicians.index')->with('success', 'Technician deleted successfully.');
    }
}
