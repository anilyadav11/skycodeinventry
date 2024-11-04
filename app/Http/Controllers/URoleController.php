<?php

namespace App\Http\Controllers;

use App\Models\URole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class URoleController extends Controller
{
    public function index()
    {
        $roles = URole::all();
        $user = Auth::user();
        return view('roles.index', compact('roles'), ['user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('roles.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required|string|unique:u_roles',
            'role' => 'required|string',
            'description' => 'required|string',
        ]);

        URole::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(URole $uRole)
    {
        $user = Auth::user();
        return view('roles.edit', compact('uRole'), ['user' => $user]);
    }

    public function update(Request $request, URole $uRole)
    {
        $request->validate([
            'level' => 'required|string|unique:u_roles,level,' . $uRole->id,
            'role' => 'required|string',
            'description' => 'required|string',
        ]);

        $uRole->update($request->all());
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(URole $uRole)
    {
        $uRole->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
