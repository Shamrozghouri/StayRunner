<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Bid;

class DashboardController extends Controller
{
    public function index()
    {
        // Access the authenticated user
        $user = Auth::user();

        // Get the user role
        $role = $user->role; // Make sure 'role' is the correct column name in the users table

        // Fetch the products for both buyers and runners
        $products = Product::all(); // Consider filtering based on user role if needed
        $bids = Bid::all(); // You can modify this based on conditions if needed

        // Pass the role, user, products, and bids to the view
        return view('dashboard', compact('user', 'role', 'products', 'bids'));
    }
}
