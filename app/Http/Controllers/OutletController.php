<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\outlate;
use App\Models\outlatetype;
use App\Models\Region;
use App\Models\URole;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\state;
use App\Models\Beat;
use App\Models\District;
use App\Models\Area;
use Illuminate\Support\Facades\Auth;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.  Beat
     */
    public function index()
    {
        $outlets = outlate::all();

        $user = Auth::user();
        return view('outlet.index', compact('outlets'), ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $emoloyee = Employee::all();
        $user_role = URole::all();
        $regions = Region::select('region_zone')->distinct()->get();
        $outlets = outlatetype::all();
        $beat = Beat::all();
        $outlettype = outlatetype::all();
        $custoner = Customer::select('customer_name')->where('customer_type', '1')->get();
        $user = Auth::user();
        return view('outlet.create', compact('outlets', 'regions', 'user_role', 'emoloyee', 'custoner', 'beat', 'outlettype'), ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        outlate::create($request->all());
        return redirect()->route('outlets.index');
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
        $districts = District::all();
        $areas = Area::all();
        $states = state::all();
        $outlet = outlate::find($id);
        $emoloyee = Employee::all();
        $user_role = URole::all();
        $regions = Region::select('region_zone')->distinct()->get();
        $outlets = outlatetype::all();
        $beat = Beat::all();
        $outlettype = outlatetype::all();
        $custoner = Customer::select('customer_name')->where('customer_type', '1')->get();
        $user = Auth::user();
        return view('outlet.edit', compact('districts', 'areas', 'outlet', 'emoloyee', 'user_role', 'regions', 'outlets', 'beat', 'outlettype', 'custoner', 'states'), ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'region_id' => 'required|exists:regions,id',
            'state_id' => 'required|exists:states,id',
            'district_id' => 'required|exists:districts,id',
            'area_id' => 'required|exists:areas,id',
            'user_role' => 'required',
            'outlate_name' => 'required|string|max:255',
            'outlate_address' => 'required|string|max:255',
            'outlate_contact_person_name' => 'required|string|max:255',
            'outlate_contact_person_number' => 'required|string|max:20',
            'dat_of_deactivation' => 'nullable|date',
            // Add validation rules for additional fields here
        ]);

        // Find the outlet by ID or throw a 404 error if not found
        $outlet = outlate::findOrFail($id);

        // Update the outlet fields with validated data
        $outlet->region_id = $validatedData['region_id'];
        $outlet->state_id = $validatedData['state_id'];
        $outlet->district_id = $validatedData['district_id'];
        $outlet->area_id = $validatedData['area_id'];
        $outlet->user_role = $validatedData['user_role'];
        $outlet->outlate_name = $validatedData['outlate_name'];
        $outlet->outlate_address = $validatedData['outlate_address'];
        $outlet->outlate_contact_person_name = $validatedData['outlate_contact_person_name'];
        $outlet->outlate_contact_person_number = $validatedData['outlate_contact_person_number'];
        $outlet->dat_of_deactivation = $validatedData['dat_of_deactivation'];
        // Update additional fields if needed

        // Save the updated outlet record to the database
        $outlet->save();

        // Redirect to the outlets list or a specific page with a success message
        return redirect()->route('outlets.index')->with('success', 'Outlet updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
