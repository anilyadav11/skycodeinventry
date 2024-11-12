<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;

class CustomeridController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $user = Auth::user();
        return view('customerid.index', compact('customers'), ['user' => $user]);
    }

    public function create()
    {
        $regions = Region::select('region_zone')->distinct()->get();
        $user = Auth::user();
        return view('customerid.create', compact('regions', 'user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'region_zone_id' => 'required|exists:regions,region_zone',
            'state_id' => 'nullable|exists:regions,id',
            'district_id' => 'nullable|exists:regions,id',
            'area_id' => 'nullable|exists:regions,id',
            'customer_type' => 'required|string',
            'supplier' => 'nullable|string|max:255',
            'customer_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'owner_name' => 'nullable|string|max:255',
            'phone_no' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'GST' => 'nullable|string|max:15',
            'PAN' => 'nullable|string|max:15',
            'rsm' => 'nullable|string|max:255',
            'asm' => 'nullable|string|max:255',
            'ase' => 'nullable|string|max:255',
            'so' => 'nullable|string|max:255',
            'sr' => 'nullable|string|max:255',
        ]);

        // Create a new customer
        Customer::create($request->all());

        return redirect()->route('customer-creation.index')->with('success', 'Customer created successfully.');
    }




    public function show(Customer $customer)
    {
        $user = Auth::user();
        return view('customerid.show', compact('customer'), ['user' => $user]);
    }

    public function edit(Customer $customer)
    {
        $user = Auth::user();
        return view('customerid.edit', compact('customer'), ['user' => $user]);
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone_no' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
        ]);

        $customer->update($request->all());
        return redirect()->route('customer-creation.index')->with('success', 'Customer updated successfully.');
    }



    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer-creation.index')->with('success', 'Customer deleted successfully.');
    }
}
