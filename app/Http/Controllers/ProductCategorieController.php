<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\categorie;
use Illuminate\Support\Facades\Auth;

class ProductCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = categorie::all();
        $user = Auth::user();
        return view('productcategorie.index', compact('categories'), ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('productcategorie.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
        ]);

        categorie::create($request->all());
        return redirect()->route('products-categories.index')->with('success', 'Product Category Created Successfully');
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
    public function edit(categorie $products_category)
    {
        $user = Auth::user();
        return view('productcategorie.edit', compact('products_category'), ['user' => $user]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $products_category = categorie::find($id);
        $products_category->update($request->all());
        return redirect()->route('products-categories.index')->with('success', 'Product Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        categorie::destroy($id);
        return redirect()->route('products-categories.index')->with('success', 'Product Category Deleted Successfully');
    }
}
