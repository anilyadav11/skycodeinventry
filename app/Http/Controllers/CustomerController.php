<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerType;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = CustomerType::all();
        $user = Auth::user();
        return view('customers.index', compact('customers'), ['user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('customers.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        CustomerType::create($request->all());
        return redirect()->route('customers.index');
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $customer = CustomerType::findOrFail($id);
        return view('customers.show', compact('customer'), ['user' => $user]);
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        $customer = CustomerType::findOrFail($id);
        return view('customers.edit', compact('customer'), ['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $customer = CustomerType::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }

    public function destroy(string $id)
    {
        $customer = CustomerType::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
