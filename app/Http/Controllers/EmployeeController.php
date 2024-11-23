<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Region;
use App\Models\URole;
use App\Models\Beat;
use App\Models\Customer;
use App\Models\CustomerType;
use App\Models\area;
use App\Models\district;
use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $status = $request->input('status');

        // Filter employees based on status if selected
        $employees = Employee::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->get();
        return view('employees.index', compact('employees'), ['user' => $user]);
    }

    public function create()
    {

        $user = Auth::user();
        $employees = Employee::all();
        $roles = URole::all();
        $regions = Region::select('region_zone')->distinct()->get();
        $beats = Beat::select('beat_1', 'beat_2', 'beat_3', 'beat_4', 'beat_5', 'beat_6', 'beat_7', 'beat_8', 'beat_9', 'beat_10', 'beat_11', 'beat_12')->get();
        $distributors = Customer::where('customer_type', '1')->get();
        $superStockists = Customer::where('customer_type', '3')->get();

        return view('employees.create', compact('roles', 'regions', 'beats', 'distributors', 'superStockists', 'employees'), ['user' => $user]);
    }



    public function store(Request $request)
    {

        $request->validate([
            'employee_name' => 'required',
            'user_role_id' => 'required|exists:u_roles,id',
            'phone_no' => 'required|unique:employees,phone_no',
            'email' => 'required|email|unique:employees,email',
            'emp_code' => 'required',
            'region_id' => 'required|exists:regions,region_zone',
        ]);

        // Retrieve the last employee's user_code
        $lastEmployee = Employee::orderBy('id', 'desc')->first();

        // If an employee exists, extract and increment the numeric part of the last user_code
        if ($lastEmployee) {
            $lastCode = intval(substr($lastEmployee->user_code, 4)); // Extract numeric part (e.g., from SFBX0001 get 0001)
            $newCode = str_pad($lastCode + 1, 4, '0', STR_PAD_LEFT); // Increment and pad to 4 digits
        } else {
            // If no employee exists, start with 0001
            $newCode = str_pad(1, 4, '0', STR_PAD_LEFT);
        }

        // Set the new user_code with 'SFBX' prefix
        $employee = new Employee();
        $employee->user_code = 'SFBX' . $newCode;

        // Fill in the rest of the employee data
        $employee->fill($request->except(['beats', 'distributors', 'super_stockists']));

        //  $employee->district_id = $request->input('district_name');
        //  $employee->area_id = $request->input('area_name');

        // Assign additional fields
        $employee->beats = $request->input('beats');
        $employee->distributors = $request->input('distributors');
        $employee->super_stockists = $request->input('super_stockists');
        $employee->region_id = $request->input('region_id');

        // Assign reporting hierarchy
        $employee->rsm_id = $request->input('rsm_id');
        $employee->asm_id = $request->input('asm_id');
        $employee->ase_id = $request->input('ase_id');
        $employee->so_id = $request->input('so_id');
        $employee->se_id = $request->input('se_id');

        // Save the employee
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }



    public function show(Employee $employee)
    {

        $user = Auth::user();
        return view('employees.show', compact('employee'), ['user' => $user]);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $employee = Employee::findOrFail($id);
        $roles = URole::all();
        // Fetch distinct values from the regions table
        $regions = Region::select('region_zone')->distinct()->get();
        $states = State::all();


        $districts = District::all();
        $areas = Area::all();


        $beats = Beat::all();
        $distributors = Customer::where('customer_type', '1')->get();
        $superStockists = Customer::where('customer_type', '3')->get();

        return view('employees.edit', compact('employee', 'roles', 'regions', 'beats', 'distributors', 'superStockists', 'states', 'districts', 'areas'), ['user' => $user]);
    }

    public function update(Request $request, $id)
    {


        // Validate the incoming request data
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'user_role_id' => 'required|exists:u_roles,id',
            'phone_no' => 'required|string|max:15',
            'email' => 'required|email',
            'address' => 'nullable|string',
            'region_id' => 'required|exists:regions,region_zone',
            'beats' => 'nullable|array',
            'distributors' => 'nullable|array',
            'super_stockists' => 'nullable|array',
            'emp_code' => 'required|string|max:20',
        ]);

        // Find the employee by ID
        $employee = Employee::findOrFail($id);

        // Update the employee attributes
        $employee->employee_name = $request['employee_name'];
        $employee->user_role_id = $validated['user_role_id'];
        $employee->phone_no = $validated['phone_no'];
        $employee->email = $validated['email'];
        $employee->address = $validated['address'];
        $employee->region_id = $validated['region_id'];
        $employee->state_id  = $request['state_id'];
        $employee->district_id  = $request['district_id'];
        $employee->area_id  = $request['area_id'];
        $employee->emp_code = $validated['emp_code'];

        // Assuming you have a JSON field for beats, distributors, and super_stockists
        $employee->beats = $validated['beats'] ?? [];
        $employee->distributors = json_encode($validated['distributors'] ?? []);
        $employee->super_stockists = json_encode($validated['super_stockists'] ?? []);

        // Save the employee
        $employee->save();

        // Redirect back to the edit form with a success message
        return redirect()->route('employees.index', $employee->id)
            ->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
    public function toggleStatus(Employee $employee)
    {
        // Toggle the status between 'active' and 'inactive'
        $employee->status = $employee->status === 'active' ? 'inactive' : 'active';

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee status updated successfully.');
    }

    // Controller
    public function getBeatsByArea($areaId)
    {
        $beats = Beat::where('area', $areaId)->first(); // Get the first match for the areaId
        if ($beats) {
            return response()->json([
                'success' => true,
                'beats' => $beats->toArray() // This will return all the beat data as an associative array
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No beats found for this area'
            ]);
        }
    }
    public function getEmployeesByLocation($locationType, $locationId)
    {
        $employees = Employee::where('status', 'active');

        switch ($locationType) {
            case 'region':
                $employees->where('region_id', $locationId);
                break;
            case 'state':
                $employees->where('state_id', $locationId);
                break;
            case 'district':
                $employees->where('district_id', $locationId);
                break;
            case 'area':
                $employees->where('area_id', $locationId);
                break;
        }

        $employees = $employees->get();

        return response()->json(['employees' => $employees]);
    }
}
