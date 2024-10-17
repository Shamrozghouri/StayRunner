<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProductController; // Import the ProductController
use App\Http\Controllers\BidController; // Import the BidController
use App\Http\Controllers\DashboardController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // List all products
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create'); // Show form to create a product
    Route::post('products', [ProductController::class, 'store'])->name('products.store'); // Store the new product
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Show form to edit a product
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update'); // Update the product
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete the product
    // Restrict edit and delete routes to sellers
    Route::middleware(['can:manage-products'])->group(function () {

    });

    // Bid routes
   // Bid routes
Route::get('/bids/create', [BidController::class, 'create'])->name('bids.create'); // Create bid form
Route::post('/bids', [BidController::class, 'store'])->name('bids.store'); // Store bid
Route::get('/bids', [BidController::class, 'indexAll'])->name('bids.index');
Route::get('/bids/{bid}/edit', [BidController::class, 'edit'])->name('bids.edit'); // Edit bid form
Route::put('/bids/{bid}', [BidController::class, 'update'])->name('bids.update'); // Update bid
Route::delete('/bids/{bid}', [BidController::class, 'destroy'])->name('bids.destroy'); // Delete bid



Route::resource('chats', ChatController::class)->middleware('auth');
Route::post('/chats/reply', [ChatController::class, 'reply'])->name('chats.reply');


});

require __DIR__ . '/auth.php';
