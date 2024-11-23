<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $product = product::all();
        $user = Auth::user();
        return view('product.index', compact('product'), ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = categorie::all();
        $user = Auth::user();
        return view('product.create', compact('category'), ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

            'sku' => 'required',

            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        product::create([
            'name' => $request->name,

            'sku' => $request->sku,
            'description' => $request->description,
            'image' => $imageName,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
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
    public function edit(product $product)
    {

        $user = Auth::user();
        $categories = categorie::all();
        return view('product.edit', compact('product', 'categories'), ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Define the path for storing images
            $destinationPath = public_path('images');

            // Delete the old image if it exists
            if ($product->image && file_exists($destinationPath . '/' . $product->image)) {
                unlink($destinationPath . '/' . $product->image);
            }

            // Store the new image in the public/images folder
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Save the image name to the validated data
            $validatedData['image'] = $imageName;
        }

        // Update the product with the validated data
        $product->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
