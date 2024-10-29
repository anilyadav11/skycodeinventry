<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $user = Auth::user();
        return view('designation.employees.index', compact('employees'), ['user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('designation.employees.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'designation' => 'required',
            'empid' => 'required|unique:employees',
            'salary' => 'required|numeric',
            'doj' => 'required|date',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
    }

    public function edit(Employee $employee)
    {
        $user = Auth::user();
        return view('designation.employees.edit', compact('employee'), ['user' => $user]);
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required',
            'designation' => 'required',
            'empid' => 'required|unique:employees,empid,' . $employee->id,
            'salary' => 'required|numeric',
            'doj' => 'required|date',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
