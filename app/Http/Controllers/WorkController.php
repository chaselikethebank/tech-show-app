<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the works.
     */
    public function index()
    {
        $works = Work::all();
        return view('dashboard', compact('works'));
    }

    /**
     * Show the form for creating a new work.
     */
    public function create()
    {
        return view('works.create');
    }

    /**
     * Store a newly created work in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'tech_id' => 'required|integer|exists:techs,id',
            'work_order_number' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string|in:estimate,sent_estimate,unassigned,assigned,inProgress,pending,done,edit_request,sublet,recall',
            'estimate' => 'required|boolean',
            'amount' => 'required|numeric',
        ]);

        Work::create($validated);

        return redirect()->route('works.index')->with('success', 'Work created successfully.');
    }

    /**
     * Display the specified work.
     */
    public function show(Work $work)
    {
        return view('works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified work.
     */
    public function edit(Work $work)
    {
        return view('works.edit', compact('work'));
    }

    /**
     * Update the specified work in storage.
     */
    public function update(Request $request, Work $work)
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'tech_id' => 'required|integer|exists:techs,id',
            'work_order_number' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string|in:estimate,sent_estimate,unassigned,assigned,inProgress,pending,done,edit_request,sublet,recall',
            'estimate' => 'required|boolean',
            'amount' => 'required|numeric',
        ]);

        $work->update($validated);

        return redirect()->route('works.index')->with('success', 'Work updated successfully.');
    }

    /**
     * Remove the specified work from storage.
     */
    public function destroy(Work $work)
    {
        $work->delete();

        return redirect()->route('works.index')->with('success', 'Work deleted successfully.');
    }
}
