<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\region_type;
use App\Models\State;
use App\Models\District;
use App\Models\Area;
use App\Models\Employee;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Fetch all regions
            $regions = region_type::all();

            // Get the authenticated user
            // $user = Auth::user();

            // Return a JSON response with regions and user
            return response()->json([
                'regions' => $regions,
                //  'user' => $user,
            ], 200); // HTTP 200 OK

        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json([
                'message' => 'An error occurred while fetching regions.',
                'error' => $e->getMessage(),
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
    public function storeAttendance(Request $request)
    {
        try {
            // Validate the incoming request
            $validated = $request->validate([
                'attendance_date' => 'required|date',
                'employee_attendance' => 'required|array',
                'employee_attendance.*.employee_id' => 'required|exists:employees,id',
                'employee_attendance.*.status' => 'required|in:Present,Absent,Leave',
            ]);

            // Loop through each employee's attendance data
            foreach ($validated['employee_attendance'] as $attendance) {
                Attendance::updateOrCreate(
                    [
                        'employee_id' => $attendance['employee_id'],
                        'attendance_date' => $validated['attendance_date'],
                    ],
                    [
                        'status' => $attendance['status'],
                    ]
                );
            }

            // Return a success response
            return response()->json([
                'message' => 'Attendance recorded successfully!',
            ], 201); // HTTP 201 Created

        } catch (\Exception $e) {
            // Handle unexpected errors
            return response()->json([
                'message' => 'An error occurred while recording attendance.',
                'error' => $e->getMessage(),
            ], 500); // HTTP 500 Internal Server Error
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
