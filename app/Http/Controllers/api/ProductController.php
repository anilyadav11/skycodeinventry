<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\categorie;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = product::all();
            return response()->json([
                'products' => $products,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An Error Occured While Fetching Products',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'sku' => 'required|string|max:255|unique:products,sku',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required|exists:categories,id',
            ]);

            // Handle image upload
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Create the product
            $product = Product::create([
                'name' => $validatedData['name'],
                'sku' => $validatedData['sku'],
                'description' => $validatedData['description'],
                'image' => $imageName,
                'category_id' => $validatedData['category_id'],
            ]);

            // Return a success response
            return response()->json([
                'message' => 'Product created successfully.',
                'product' => $product,
            ], 201); // HTTP 201 Created

        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json([
                'message' => 'An error occurred while creating the product.',
                'error' => $e->getMessage(),
            ], 500); // HTTP 500 Internal Server Error
        }
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
