<?php

namespace App\Http\Controllers;

// app/Http/Controllers/RSMController.php

use App\Models\RSM;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;

class RSMController extends Controller
{
    public function index()
    {
        $rsms = RSM::all();

        $user = Auth::user();
        return view('rsms.index', compact('rsms'), ['user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        $regions = Region::select('region_zone')->distinct()->get(); // Fetch unique regions
        return view('rsms.create', ['user' => $user, 'regions' => $regions]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'emp_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20|unique:rsms,phone_no',
            'address' => 'required|string',
            'region' => 'required|in:East,West,North,South|unique:rsms,region',
            'email' => 'nullable|email|unique:rsms,email',
            'password' => 'required|string|min:8',
        ]);

        RSM::create([
            'user_id' => Str::uuid()->toString(),
            'emp_name' => $request->emp_name,
            'user_role' => 'Regional Sales Manager',
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'region' => $request->region,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('rsms.index')->with('success', 'RSM created successfully.');
    }

    public function show(RSM $rsm)
    {
        $user = Auth::user();
        return view('rsms.show', compact('rsm'), ['user' => $user]);
    }

    public function edit(RSM $rsm)
    {
        $user = Auth::user();
        $regions = Region::select('region_zone')->distinct()->get(); // Fetch unique regions
        return view('rsms.edit', compact('rsm'), ['user' => $user, 'regions' => $regions]);
    }

    public function update(Request $request, RSM $rsm)
    {
        $request->validate([
            'emp_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20|unique:rsms,phone_no,' . $rsm->id,
            'address' => 'required|string',
            'region' => 'required|in:East,West,North,South|unique:rsms,region,' . $rsm->id,
            'email' => 'nullable|email|unique:rsms,email,' . $rsm->id,
            'password' => 'nullable|string|min:8',
        ]);

        $rsm->update([
            'emp_name' => $request->emp_name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'region' => $request->region,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $rsm->password,
        ]);

        return redirect()->route('rsms.index')->with('success', 'RSM updated successfully.');
    }

    public function destroy(RSM $rsm)
    {
        $rsm->delete();
        return redirect()->route('rsms.index')->with('success', 'RSM deleted successfully.');
    }
}
