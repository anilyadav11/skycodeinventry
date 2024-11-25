<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\outlatetype;
use Illuminate\Support\Facades\Auth;

class OutletTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlatetype = outlatetype::all();

        $user = Auth::user();
        return view('outlettype.index', compact('outlatetype'), ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('outlettype.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'outlate_name' => 'required',

        ]);

        outlatetype::create($request->all());
        return redirect()->route('outlettype.index')->with('success', 'Outlet Created Successfully');
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
    public function edit(outlatetype $outlettype)
    {

        $user = Auth::user();
        return view('outlettype.edit', compact('outlettype'), ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'outlate_name' => 'required',

        ]);

        $outlettype = outlatetype::find($id);
        $outlettype->update($request->all());
        return redirect()->route('outlettype.index')->with('success', 'Outlet Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
