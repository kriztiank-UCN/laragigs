<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// data is coming from the Model
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* 
Controllers: 
https://www.youtube.com/watch?v=MYyJ4PuL4pY&list=LL&index=95&t=6038s

we could keep it this way but usually you're going to have a controller for all your resources so we'll have a listing controller and when we start to deal with authentication and users we'll have a user controller 
*/

// Common Resource Routes:
// index - Show all listings - page
// show - Show single listing - page
// create - Show form to create new listing on create - page
// store - Store new listing (post data)
// edit - Show form to edit listing 
// update - Update listing
// destroy - Delete listing  

// All Listings (replace functions with controllers from ListingController.php)
// goes to ListingController.php and the index method loads the view
// se video: https://www.youtube.com/watch?v=MYyJ4PuL4pY&list=LL&index=95&t=6038s
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store listing Data
// submit form data to this route
// goes to ListingController.php and the store method loads the view
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
// goes to ListingController.php and the edit method loads the view
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Edit/update Listing
// goes to ListingController.php and the update method loads the view
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// KEEP AT THE END OF THE FILE!
// Single Listing (404 not found: Route Model Binding)
// goes to ListingController.php and the show method loads the view
Route::get('/listings/{listing}', [ListingController::class, 'show']);


