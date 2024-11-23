<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\outlate;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Fetch beats with their related state and district
            $outlates = outlate::with([
                'state:id,state',
                'district:id,district',
                'area:id,area' // Uncomment if 'area' relationship is needed
            ])
                ->get()
                ->map(function ($outlate) {
                    return [
                        'id' => $outlate->id,
                        'user_role' => $outlate->user_role, // Assuming `beat_1` represents the main beat name
                        'state' => $outlate->state ? $outlate->state->state : null,
                        'district' => $outlate->district ? $outlate->district->district : null,
                        'area' => $outlate->area ? $outlate->area->area : null, // Uncomment if 'area' is needed
                        'doj' => $outlate->doj,
                        'emp_role' => $outlate->emp_role,
                        'emp_name' => $outlate->emp_name,
                        'emp_status' => $outlate->emp_status,
                        'emp_inactive' => $outlate->emp_inactive,
                        'ss_side' => $outlate->ss_side,
                        'ss_name' => $outlate->ss_name,
                        'distributor_code' => $outlate->distributor_code,
                        'distributor_name' => $outlate->distributor_name,
                        'beat_name' => $outlate->beat_name,
                        'outlate_type' => $outlate->outlate_type,
                        'outlate_name' => $outlate->outlate_name,
                        'outlate_address' => $outlate->outlate_address,
                        'outlate_contact_person_name' => $outlate->outlate_contact_person_name,
                        'outlate_contact_person_number' => $outlate->outlate_contact_person_number,
                        'outlate_status' => $outlate->outlate_status,
                        'dat_of_activation' => $outlate->dat_of_activation,
                        'dat_of_deactivation' => $outlate->dat_of_deactivation,

                    ];
                });

            // Return a JSON response
            return response()->json([
                'outlates' => $outlates,
            ], 200); // HTTP 200 OK

        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json([
                'message' => 'An error occurred while fetching beats.',
                'error' => $e->getMessage()
            ], 500); // HTTP 500 Internal Server Error
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            // $validCustomerTypes = outlate::pluck('customer_type')->toArray();
            $validatedData = $request->validate([
                'region_id' => 'required',
                'state_id' => 'nullable',
                'district_id' => 'nullable',
                'area' => 'nullable|string|max:255',
                'user_role' => 'required|exists:u_roles,id',
                'doj' => 'required',
                'emp_role' => 'required',
                'emp_name' => 'required',

                'emp_inactive' => 'required',
                'ss_side' => 'required',
                'ss_name' => 'required',
                'distributor_code' => 'required',
                'distributor_name' => 'required',
                'beat_name' => 'required',
                'outlate_type' => 'required',
                'outlate_name' => 'required',
                'outlate_address' => 'required',
                'outlate_contact_person_name' => 'required',
                'outlate_contact_person_number' => 'required',
                'dat_of_activation' => 'required',
                'dat_of_deactivation' => 'required',

            ]);

            // Create the Beat record
            $beat = outlate::create($validatedData);

            // Return a success response
            return response()->json([
                'message' => 'Beat created successfully.',
                'beat' => $beat
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Handle any other errors
            return response()->json([
                'message' => 'An error occurred while creating the beat.',
                'error' => $e->getMessage()
            ], 500);
        }
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
