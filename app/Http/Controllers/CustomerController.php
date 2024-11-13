<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
// Import the Customer model

class CustomerController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        // Retrieve all customers from the database
        $customers = Customer::all();

        // Return the view with the list of customers
        return view( 'customers.index', compact( 'customers' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'customers.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        // Validate the incoming request data
        $validatedData = $request->validate( [
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ] );

        // Create a new customer in the database
        Customer::create( $validatedData );

        // Redirect to the index page with a success message
        return redirect()->route( 'customers.index' )->with( 'success', 'Customer created successfully.' );
    }

    /**
    * Display the specified resource.
    */

    public function show( Customer $customer ) {
        $vehicles = $customer->vehicles;
        return view( 'customers.show', compact( 'customer', 'vehicles' ) );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( Customer $customer ) {
        // Return the view with the specific customer for editing
        return view( 'customers.edit', compact( 'customer' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, Customer $customer ) {
        // Validate the incoming request data
        $validatedData = $request->validate( [
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zip' => 'nullable|string|max:20',
            'notes' => 'nullable|string',
        ] );

        // Update the customer in the database
        $customer->update( $validatedData );

        // Redirect to the index page with a success message
        return redirect()->route( 'customers.index' )->with( 'success', 'Customer updated successfully.' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( Customer $customer ) {
        // Delete the customer from the database
        $customer->delete();

        // Redirect to the index page with a success message
        return redirect()->route( 'customers.index' )->with( 'success', 'Customer deleted successfully.' );
    }
}
