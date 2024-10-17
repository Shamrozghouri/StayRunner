<?php
namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    /**
     * Show the form to create a new bid.
     */
    public function create()
    {
        $products = Product::all(); // Adjust this based on your requirements

    return view('bids.create', compact('products'));
    }

    /**
     * Display all bids for the authenticated user.
     */
    public function indexAll()
    { $products = Product::all();
         $user = Auth::user();

        // Get the user role
        $role = $user->role; // Make sure 'role' is the correct column name in the users table

        // Fetch the products for both buyers and runners
        $products = Product::all(); // Consider filtering based on user role if needed
        $bids = Bid::all(); // You
        return view('bids.index', compact('user', 'role', 'products', 'bids'));
    }

    /**
     * Store a newly created bid in storage.
     */
    // App\Http\Controllers\BidController.php

    public function store(Request $request)
{
    // Ensure the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be signed in to create a bid.');
    }

    $request->validate([
        'what_you_need' => 'required|string',
        'email' => 'required|email',
        'city' => 'required|string',
        'delivery_address' => 'required|string',
        'name' => 'required|string',
        'special_instructions' => 'nullable|string',
        'price' => 'required|numeric',
        'payment_type' => 'required|in:Cash,Online Banking',
        'product_id' => 'nullable|exists:products,id', // Allow nullable product_id for custom products
    ]);

    Bid::create([
        'user_id' => Auth::id(), // Store the authenticated user's ID
        'product_id' => $request->product_id ?? null,
        'what_you_need' => $request->what_you_need,
        'email' => $request->email,
        'city' => $request->city,
        'delivery_address' => $request->delivery_address,
        'name' => $request->name,
        'special_instructions' => $request->special_instructions,
        'price' => $request->price,
        'payment_type' => $request->payment_type,
    ]);

    return redirect()->route('bids.index')->with('status', 'Bid created successfully!');
}



    /**
     * Show the form for editing the specified bid.
     */
    public function edit(Bid $bid)
    {
        // Make sure the user can only edit their own bids
        if ($bid->user_id !== Auth::id()) {
            abort(403);
        }
        $products = Product::all();

        return view('bids.update', compact('bid','products'));
    }

    /**
     * Update the specified bid in storage.
     */
    public function update(Request $request, Bid $bid)
    {
        // Make sure the user can only update their own bids
        if ($bid->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'what_you_need' => 'required|string',
            'email' => 'required|email',
            'city' => 'required|string',
            'delivery_address' => 'required|string',
            'name' => 'required|string',
            'special_instructions' => 'nullable|string',
            'price' => 'required|numeric',
            'payment_type' => 'required|in:Cash,Online Banking',
            'product_id' => 'nullable|exists:products,id', // Allow nullable product_id for custom products

        ]);

        // Update the bid
        $bid->update([
            'what_you_need' => $request->what_you_need,
            'email' => $request->email,
            'city' => $request->city,
            'delivery_address' => $request->delivery_address,
            'name' => $request->name,
            'special_instructions' => $request->special_instructions,
            'price' => $request->price,
            'payment_type' => $request->payment_type,
            'product_id' => $request->product_id ?? null,
        ]);

        return redirect()->route('bids.index')->with('status', 'Bid updated successfully!');
    }

    /**
     * Remove the specified bid from storage.
     */
    public function destroy(Bid $bid)
    {
        // Make sure the user can only delete their own bids
        if ($bid->user_id !== Auth::id()) {
            abort(403);
        }

        // Delete the bid
        $bid->delete();

        return redirect()->route('bids.index')->with('status', 'Bid deleted successfully!');
    }
}
