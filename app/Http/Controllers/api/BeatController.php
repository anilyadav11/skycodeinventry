<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beat;
use App\Models\CustomerType;
use Illuminate\Support\Facades\Auth;

class BeatController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Fetch beats with their related state and district
            $beats = Beat::with([
                'state:id,state',
                'district:id,district',
                'area:id,area' // Uncomment if 'area' relationship is needed
            ])
                ->get()
                ->map(function ($beat) {
                    return [
                        'id' => $beat->id,
                        'name' => $beat->beat_1, // Assuming `beat_1` represents the main beat name
                        'state' => $beat->state ? $beat->state->state : null,
                        'district' => $beat->district ? $beat->district->district : null,
                        'area' => $beat->area ? $beat->area->area : null, // Uncomment if 'area' is needed
                    ];
                });

            // Return a JSON response
            return response()->json([
                'beats' => $beats,
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
            $validCustomerTypes = CustomerType::pluck('customer_type')->toArray();
            $validatedData = $request->validate([
                'region_zone_id' => 'required|exists:regions,region_zone',
                'state_id' => 'nullable',
                'district_id' => 'nullable',
                'area' => 'nullable|string|max:255',
                'emp_role_id' => 'required|exists:u_roles,id',
                'customer_type' => 'required',
                'customer_name' => 'required|string|max:255',
                'beat_1' => 'nullable|string|max:255',
                'beat_2' => 'nullable|string|max:255',
                'beat_3' => 'nullable|string|max:255',
                'beat_4' => 'nullable|string|max:255',
                'beat_5' => 'nullable|string|max:255',
                'beat_6' => 'nullable|string|max:255',
                'beat_7' => 'nullable|string|max:255',
                'beat_8' => 'nullable|string|max:255',
                'beat_9' => 'nullable|string|max:255',
                'beat_10' => 'nullable|string|max:255',
                'beat_11' => 'nullable|string|max:255',
                'beat_12' => 'nullable|string|max:255',
            ]);

            // Create the Beat record
            $beat = Beat::create($validatedData);

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
