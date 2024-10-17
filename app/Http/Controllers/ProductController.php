<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
// Show form to create a new product
public function create()
{
    return view('products.create');
}

    // Display a listing of products
    public function index()
{
      $user = Auth::user();

        // Get the user role
        $role = $user->role; // Make sure 'role' is the correct column name in the users table

        // Fetch the products for both buyers and runners
        $products = Product::all(); // Consider filtering based on user role if needed
        $bids = Bid::all(); // You

    return view('products.index', compact('user', 'role', 'products', 'bids'));
}

    public function store(Request $request)
    {
        $request->validate([
             'name' => 'required|string',
            'min_price' => 'required|numeric',
                'payment_options' => 'required|string',
            'city' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'size' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation as needed
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public'); // Store in public disk
        }

        // Create the product
        Product::create([
            'name' => $request->name,

            'min_price' => $request->min_price,
            'payment_options' => json_encode($request->payment_options), // Assuming you want to store this as JSON
            'city' => $request->city,
            'description' => $request->description,
            'size' => $request->size,
            'image' => $path ?? null, // Assign the path or null if no image uploaded
            'user_id' => Auth::id(), // Set the user_id to the authenticated user's ID
        ]);


        return redirect()->route('products.index')->with('success', 'Product listed successfully!');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Fetch product by ID
        return view('products.edit', compact('product')); // Pass product to the view
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',

            'min_price' => 'required|numeric',
            'payment_options' => 'required|array',
            'city' => 'required|string|max:255',
            'description' => 'required|string',
            'size' => 'required|string|in:small,medium,large',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->description;

        $product->min_price = $request->min_price;
        $product->payment_options = json_encode($request->payment_options);
        $product->city = $request->city;
        $product->description = $request->description;
        $product->size = $request->size;

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Assuming you want to delete the old image if necessary
            if ($product->image) {
                \Illuminate\Support\Facades\Storage::delete($product->image);
            }
            $product->image = $request->file('image')->store('products');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete(); // Deletes the product

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
