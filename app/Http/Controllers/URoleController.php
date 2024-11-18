<?php

namespace App\Http\Controllers;

use App\Models\URole;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class URoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = URole::all();
        $user = Auth::user();
        return view('u_roles.index', compact('roles'), ['user' => $user]);
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        $user = Auth::user();
        return view('u_roles.create', ['user' => $user]);
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required|string|unique:u_roles,level',
            'role' => 'required|string',
            'description' => 'required|string',
        ]);

        URole::create($request->all());

        return redirect()->route('u_roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified role.
     */
    public function show(URole $uRole)
    {
        $user = Auth::user();
        return view('u_roles.show', compact('uRole'), ['user' => $user]);
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(URole $uRole)
    {
        $user = Auth::user();
        return view('u_roles.edit', compact('uRole'), ['user' => $user]);
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, URole $uRole)
    {
        $request->validate([
            'level' => 'required|string|unique:u_roles,level,' . $uRole->id,
            'role' => 'required|string',
            'description' => 'required|string',
        ]);

        $uRole->update($request->all());

        return redirect()->route('u_roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(URole $uRole)
    {
        if ($uRole->employees()->exists()) {
            // Proceed with deletion, knowing there are associated employees
            $uRole->employees()->delete(); // First delete associated employees
        }

        $uRole->delete(); // Then delete the role

        return redirect()->route('u_roles.index')->with('success', 'Role and associated employees deleted successfully.');
    }
}
