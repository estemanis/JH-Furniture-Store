<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/update_furniture', function () {
    return view('update_furniture');
});

Route::get('/', [GuestController::class, 'indexLogin'])->name('indexLogin');

// Login
Route::get('/login', [GuestController::class, 'indexLogin'])->name('indexLogin');
Route::post('/login', [GuestController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [GuestController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [GuestController::class, 'indexRegister'])->name('indexRegister');
Route::post('/register', [GuestController::class, 'register'])->name('register');

// Update Profile
Route::get('/update-profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-profile', [ProfileController::class, 'edit'])->name('edit');

// Home
Route::get('/home', [HomeController::class, 'home'])->name('home');

// Profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

// View
Route::get('/view', [ViewController::class, 'view'])->name('view');

// Add Furniture
Route::get('/add-furniture', [FurnitureController::class, 'addFurniture'])->name('addFurniture')->middleware('my.authorization'); 
Route::post('/add-furniture', [FurnitureController::class, 'add'])->name('add');

// Update Furniture
Route::get('/update-furniture/{id}', [FurnitureController::class, 'updateFurniture']);
Route::post('/update-furniture/{id}', [FurnitureController::class, 'edit']); 

// Delete Furniture
Route::post('/delete-furniture/{id}', [FurnitureController::class, 'delete']);

// Detail Furniture
Route::get('/detail-furniture/{id}', [FurnitureController::class, 'detailFurniture'])->name('detailFurniture');

// Previous
// Route::get('/previous', [furnitureController::class, 'previous'])->name('previous');

// Transaction
Route::get('/transaction-history', [TransactionController::class, 'viewTransaction'])->name('viewTransaction');

// Cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/cart/{id}', [CartController::class, 'addtoCart'])->name('addtoCart');
Route::get('/minus/{id}', [CartController::class, 'minus'])->name('minus');
Route::get('/plus/{id}', [CartController::class, 'plus'])->name('plus');

//Checkout
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/paid', [CartController::class, 'pay'])->name('pay');
