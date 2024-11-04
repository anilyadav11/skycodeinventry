<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\URole; // Assuming URole is the model for user roles
use App\Models\Region; // Assuming Region is the model for regions
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('userRole')->get(); // Assuming a relationship is defined
        $user = Auth::user();
        return view('employees.index', compact('employees'), ['user' => $user]);
    }

    public function create()
    {
        $roles = URole::all();
        $regions = Region::all();
        $user = Auth::user();
        return view('employees.create', compact('roles', 'regions'), ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_code' => 'required|string|unique:employees',
            'emp_name' => 'required|string',
            'user_role_id' => 'required|exists:u_roles,id',
            'phone_no' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'region_id' => 'required|exists:regions,id',
            'state' => 'nullable|string',
            'district' => 'nullable|string',
            'area' => 'nullable|string',
            'beat' => 'nullable|string',
            'rsm' => 'nullable|string',
            'asm' => 'nullable|string',
            'ase' => 'nullable|string',
            'so' => 'nullable|string',
            'sr' => 'nullable|string',
            'distributor' => 'nullable|string',
            'super_stokiest' => 'nullable|string',
            'emp_code' => 'nullable|string',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $roles = URole::all();
        $regions = Region::all();
        $user = Auth::user();
        $employees = Employee::all();
        return view('employees.edit', compact('employee', 'roles', 'regions', 'employees'), ['user' => $user]);
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            // Similar validation rules as store method
            'user_code' => 'required|string|unique:employees',
            'emp_name' => 'required|string',
            'user_role_id' => 'required|exists:u_roles,id',
            'phone_no' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'region_id' => 'required|exists:regions,id',
            'state' => 'nullable|string',
            'district' => 'nullable|string',
            'area' => 'nullable|string',
            'beat' => 'nullable|string',
            'rsm' => 'nullable|string',
            'asm' => 'nullable|string',
            'ase' => 'nullable|string',
            'so' => 'nullable|string',
            'sr' => 'nullable|string',
            'distributor' => 'nullable|string',
            'super_stokiest' => 'nullable|string',
            'emp_code' => 'nullable|string',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
