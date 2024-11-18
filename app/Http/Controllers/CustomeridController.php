<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;
use App\Models\CustomerType;
use App\Models\area;
use App\Models\district;
use App\Models\state;

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
        $customertype = CustomerType::all();
        return view('customerid.create', compact('regions', 'user', 'customertype'));
    }


    public function store(Request $request)
    {
        $request->validate([
            //    'region_zone_id' => 'required|exists:regions,region_zone',
            //  'state_id' => 'nullable|exists:regions,id',  // Assuming 'id' is the correct column in the regions table
            // 'district_id' => 'nullable|exists:regions,id', // Adjust similarly
            //  'area_id' => 'nullable|exists:regions,id',      // Adjust similarly
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

        // Retrieve the last customer's customer_code
        $lastCustomer = Customer::orderBy('id', 'desc')->first();

        // If a customer exists, extract and increment the numeric part of the last customer_code
        if ($lastCustomer) {
            $lastCode = intval(substr($lastCustomer->customer_code, 4)); // Extract numeric part (e.g., from CUST0001 get 0001)
            $newCode = str_pad($lastCode + 1, 4, '0', STR_PAD_LEFT); // Increment and pad to 4 digits
        } else {
            // If no customer exists, start with 0001
            $newCode = str_pad(1, 4, '0', STR_PAD_LEFT);
        }

        // Set the new customer_code with 'CUST' prefix
        $customer = new Customer();
        $customer->customer_code = 'CUST' . $newCode;

        // Fill in the rest of the customer data
        $customer->fill($request->except(['rsm', 'asm', 'ase', 'so', 'sr']));

        // Assign reporting hierarchy or other custom fields if needed
        $customer->rsm = $request->input('rsm');
        $customer->asm = $request->input('asm');
        $customer->ase = $request->input('ase');
        $customer->so = $request->input('so');
        $customer->sr = $request->input('sr');

        // Save the customer
        $customer->save();

        return redirect()->route('customer-creation.index')->with('success', 'Customer created successfully.');
    }





    public function show(Customer $customer)
    {
        $user = Auth::user();
        return view('customerid.show', compact('customer'), ['user' => $user]);
    }

    public function edit($id)
    {
        $states = State::all();

        $user = Auth::user();
        $districts = District::all();
        $areas = Area::all();
        $customer = Customer::findOrFail($id);
        $regions = Region::select('region_zone')->distinct()->get();
        return view('customerid.edit', compact('customer', 'regions', 'states', 'districts', 'areas', 'user'));
        // $user = Customer::findOrFail($customer);
        // return view('customerid.edit', compact('customer'));
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


    public function toggleStatus(Customer $customer)
    {
        // Toggle the status between 'active' and 'inactive'
        $customer->status = $customer->status === 'active' ? 'inactive' : 'active';

        $customer->save();

        return redirect()->route('customer-creation.index')->with('success', 'Customer status updated successfully.');
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer-creation.index')->with('success', 'Customer deleted successfully.');
    }
}
