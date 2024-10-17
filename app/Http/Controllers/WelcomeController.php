<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
     public function index()
    {
        // Access the authenticated user

        // Pass the role, user, products, and bids to the view
        return view('welcome');
    }
}
