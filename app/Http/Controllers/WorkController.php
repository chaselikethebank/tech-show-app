<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Tech;
use App\Models\Vehicle;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller {
    /**
    * Display a listing of the works.
    */

    public function index() {
        $works = Work::all();
        $technicians = Tech::all();
        $vehicles = Vehicle::all();

        return view( 'components.works', compact( 'works', 'technicians', 'vehicles' ) );
    }

    /**
    * Show the form for creating a new work.
    */

    public function create() {
        $customers = Customer::all();
        $works = Work::all();
        $technicians = Tech::all();
        $vehicles = Vehicle::all();
        $statuses = config( 'status.statuses' );

        return view( 'works.create', compact( 'customers', 'works', 'technicians', 'vehicles', 'statuses' ) );
    }

    public function getVehiclesByCustomer( Request $request ) {
        $customerId = $request->input( 'customer_id' );

        // Ensure customer_id is valid
        if ( empty( $customerId ) || !is_numeric( $customerId ) ) {
            return response()->json( [ 'error' => 'Invalid customer ID' ], 400 );
        }

        // Fetch vehicles
        try {
            $vehicles = Vehicle::where( 'customer_id', $customerId )->get();
            return response()->json( $vehicles );
        } catch ( \Exception $e ) {
            // Log the error and return a server error response
            \Log::error( 'Error fetching vehicles: ' . $e->getMessage() );
            return response()->json( [ 'error' => 'Internal Server Error' ], 500 );
        }
    }

    /**
    * Store a newly created work in storage.
    */

    public function store( Request $request ) {
        $validated = $request->validate( [
            'customer_id' => 'required|integer|exists:customers,id',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'technician_id' => 'required|integer|exists:techs,id',
            'license_plate' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'personal' => 'nullable|string',
            'description' => 'required|string',
            'status' => 'required|string|in:estimate,sent_estimate,unassigned,assigned,inProgress,pending,done,edit_request,sublet,recall',
            'sent' => 'nullable|boolean',
            'scheduled_at' => 'nullable|date',
            'started_at' => 'nullable|date',
            'completed_at' => 'nullable|date',
            'estimated_cost' => 'nullable|numeric',
            'final_cost' => 'nullable|numeric',
            'urgent' => 'nullable|boolean',
            'notes' => 'nullable|string',
            'recall_notes' => 'nullable|string',
            'customer_feedback' => 'nullable|string',
            'customer_rating' => 'nullable|string|in:not_rated,poor,fair,good,excellent',
            'service_type' => 'nullable|string',
            'service_duration' => 'nullable|string',
            'additional_costs' => 'nullable|numeric',
            'customer_authorization_timestamp' => 'nullable|date',
            'quality_assurance_check' => 'nullable|boolean',
            'post_service_follow_up' => 'nullable|date',
            'service_warranty' => 'nullable|string',
            'customer_signature_image' => 'nullable|string',
            'service_photos' => 'nullable|string',
            'referral_source' => 'nullable|string',
            'follow_up_actions' => 'nullable|string|in:none,call,email,visit',
            'turnaround_time' => 'nullable|string',
            'turnaround_notification' => 'nullable|date',
            'customer_approval_with_signature' => 'nullable|boolean',
        ] );

        Work::create( $validated );

        return redirect()->route( 'works.index' )->with( 'success', 'Work created successfully.' );
    }

    /**
    * Display the specified work.
    */

    public function show( Work $work ) {
        return view( 'works.show', compact( 'work' ) );
    }

    /**
    * Show the form for editing the specified work.
    */

    public function edit( Work $work ) {
        return view( 'works.edit', compact( 'work' ) );
    }

    /**
    * Update the specified work in storage.
    */

    public function update( Request $request, Work $work ) {
        $validated = $request->validate( [
            'customer_id' => 'required|integer|exists:customers,id',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'tech_id' => 'required|integer|exists:techs,id',
            'work_order_number' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string|in:estimate,sent_estimate,unassigned,assigned,inProgress,pending,done,edit_request,sublet,recall',
            'estimate' => 'required|boolean',
            'amount' => 'required|numeric',
        ] );

        $work->update( $validated );

        return redirect()->route( 'works.index' )->with( 'success', 'Work updated successfully.' );
    }

    /**
    * Remove the specified work from storage.
    */

    public function destroy( Work $work ) {
        $work->delete();

        return redirect()->route( 'works.index' )->with( 'success', 'Work deleted successfully.' );
    }

    public function assignTechnician( Request $request, $id ) {
        $work = Work::findOrFail( $id );
        $work->technician_id = $request->input( 'technician_id' );
        $work->status = 'assigned';
        $work->save();

        return redirect()->route( 'dashboard' );
    }

    public function storeVehicle(Request $request) {

        dd($request->all());

        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
        ]);

        try {
            // dd($request->all());

            $createdVehicle = Vehicle::create($request->all());
            Log::info($createdVehicle->toArray());
            return response()->json(['success' => true, 'vehicle' => $createdVehicle]);
        } catch (\Exception $e) {
            Log::error('Important Alert: ' . $e->getMessage());
            dd($e);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
