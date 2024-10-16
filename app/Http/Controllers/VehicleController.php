<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;

class VehicleController extends Controller {
    /**
    * Display a listing of the vehicles.
    */

    public function index() {
        $vehicles = Vehicle::all();
        return view( 'vehicles.index', compact( 'vehicles' ) );
    }

    /**
    * Show the form for creating a new vehicle.
    */

    public function create() {
        $customers = Customer::all();
        return view( 'vehicles.create', compact( 'customers' ) );
    }

    /**
    * Store a newly created vehicle in storage.
    */

    /**
    * Display the specified vehicle.
    */

    public function show( Vehicle $vehicle ) {
        return view( 'vehicles.show', compact( 'vehicle' ) );
    }

    /**
    * Show the form for editing the specified vehicle.
    */

    public function edit( Vehicle $vehicle ) {
        $customers = Customer::all();
        return view( 'vehicles.edit', compact( 'vehicle', 'customers' ) );
    }

    /**
    * Update the specified vehicle in storage.
    */

    public function store( Request $request ) {
        $validated = $request->validate( [
            'customer_id' => 'required|integer|exists:customers,id',
            // 'license_plate' => 'required|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            // Add other vehicle fields as needed
        ] );

        $vehicle = Vehicle::create( $validated );

        return response()->json( [ 'message' => 'Vehicle created successfully', 'vehicle' => $vehicle ] );
    }
}
