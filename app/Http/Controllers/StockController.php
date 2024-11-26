<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\product;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $stocks = Stock::all();
        $products = product::all();
        return view('stocks.index', compact('stocks', 'products'), ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::select('region_zone')->distinct()->get();
        $user = Auth::user();
        $products = product::all();
        return view('stocks.create', compact('products', 'regions'), ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'zone_id' => 'required',
            'state_id' => 'required',
            'product_id' => 'required',
            'area_id' => 'required',
            'product_id' => 'required',
            'unit' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);
        $totlepric = $request->price * $request->quantity;
        $stock = new Stock();
        $stock->zone_id = $request->zone_id;
        $stock->state_id = $request->state_id;
        $stock->district_id = $request->district_id;
        $stock->area_id = $request->area_id;
        $stock->product_id = $request->product_id;
        $stock->unit = $request->unit;
        $stock->price = $request->price;
        $stock->quantity = $request->quantity;
        $stock->total_price = $totlepric;
        $stock->sept_month_opening_stock = $request->sept_month_opening_stock;
        $stock->sept_primary_order = $request->sept_primary_order;
        $stock->sept_month_closing_stock = $totlepric;
        $stock->sept_month_closing_stock = $request->sept_month_closing_stock;
        $stock->sept_secondary = $request->sept_secondary;
        $stock->tdp1_opening_stock = $request->tdp1_opening_stock;
        $stock->tdp1_primary_order = $request->tdp1_primary_order;
        $stock->tdp1_month_closing_stock =  $request->tdp1_month_closing_stock;
        $stock->tdp1_secondary =  $request->tdp1_secondary;
        $stock->tdp2_opening_stock =  $request->tdp2_opening_stock;
        $stock->tdp2_primary_order =  $request->tdp2_primary_order;
        $stock->tdp2_secondary =  $request->tdp2_secondary;
        $stock->tdp3_opening_stock =  $request->tdp3_opening_stock;
        $stock->tdp3_primary_order =  $request->tdp3_primary_order;
        $stock->tdp3_month_closing_stock =  $request->tdp3_month_closing_stock;
        $stock->tdp3_secondary =  $request->tdp3_secondary;
        $stock->save();
        return redirect()->route('stocks.index')->with('success', 'Stock added successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
