<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\product_pricing;
use Illuminate\Support\Facades\Auth;

class ProductPricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $user = Auth::user();
        $prices = product_pricing::all();
        return view('product-pricing.index', compact('prices'), ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {

        $user = Auth::user();
        $products = Product::all();
        return view('product-pricing.create', compact('product', 'products'), ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'required',
            'unit_type' => 'required|in:per_piece,per_case',
            'customer_type' => 'required|in:retail,distributor,wholesaler',
            'price' => 'required|numeric|min:0',
        ]);

        product_pricing::create($request->all());

        return redirect()->route('product-pricing.index')->with('success', 'Price added successfully.');
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
    public function edit(product_pricing $pricing)
    {

        $user = Auth::user();
        $products = Product::all();
        return view('product-pricing.edit', compact('pricing', 'products'), ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, product_pricing $pricing)
    {
        $request->validate([
            'unit_type' => 'required|in:per_piece,per_case',
            'customer_type' => 'required|in:retail,distributor,wholesaler',
            'price' => 'required|numeric|min:0',
        ]);

        $pricing->update($request->all());

        return redirect()->route('product-pricing.index', $product->id)->with('success', 'Price updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, product_pricing $pricing)
    {
        $pricing->delete();

        return redirect()->route('product-pricing.index', $product->id)->with('success', 'Price deleted successfully.');
    }
}
