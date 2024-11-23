<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\region_type;
use App\Models\State;
use App\Models\District;
use App\Models\Area;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        // Fetch all regions to populate the first dropdown
        $regions = region_type::all();
        $user = Auth::user();
        return view('attendance.attendance', compact('regions'), ['user' => $user]);
    }

    public function filter(Request $request)
    {
        $regionId = $request->region_id;
        $stateId = $request->state_id;
        $districtId = $request->district_id;
        $areaId = $request->area_id;

        $employees = Employee::with(['region', 'state', 'district', 'area'])
            ->when($regionId, fn($query) => $query->where('region_id', $regionId))
            ->when($stateId, fn($query) => $query->where('state_id', $stateId))
            ->when($districtId, fn($query) => $query->where('district_id', $districtId))
            ->when($areaId, fn($query) => $query->where('area_id', $areaId))
            ->get();

        return response()->json($employees->map(function ($employee) {
            return [
                'id' => $employee->id,
                'employee_name' => $employee->employee_name,
                'region' => $employee->region->region_zone ?? 'N/A',
                'state' => $employee->state->state ?? 'N/A',
                'district' => $employee->district->district ?? 'N/A',
                'area' => $employee->area->area ?? 'N/A',
            ];
        }));
    }

    public function createAttendance()
    {
        $regions = region_type::all();
        $user = Auth::user();
        return view('attendance.attendance_form', compact('regions'), ['user' => $user]);   
    }

    // Handle attendance form submission
    public function storeAttendance(Request $request)
    {
        $validated = $request->validate([
            'attendance_date' => 'required|date',
            'employee_attendance' => 'required|array',
            'employee_attendance.*.employee_id' => 'required|exists:employees,id',
            'employee_attendance.*.status' => 'required|in:Present,Absent,Leave',
        ]);

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

        return redirect()->route('attendance.create')->with('success', 'Attendance recorded successfully!');
    }

    public function getStates($regionId)
    {

        return State::where('region_zone_id', $regionId)->get();
    }

    public function getDistricts($stateId)
    {
        return District::where('state_id', $stateId)->get();
    }

    public function getAreas($districtId)
    {
        return Area::where('district_id', $districtId)->get();
    }
}
