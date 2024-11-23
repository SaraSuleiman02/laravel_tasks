<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function () {
    return view('dashboard.home');
})->name('dashboard.home');

Route::middleware('auth')->group(function () {

    // Admin-specific routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard/user', [UserController::class, 'index'])->name('dashboard.user');
        Route::get('/dashboard/user-details', [UserDetailController::class, 'index'])->name('dashboard.user_details');
        Route::get('/dashboard/service', [ServiceController::class, 'index'])->name('dashboard.service');
        Route::get('/dashboard/vendor', [VendorController::class, 'index'])->name('dashboard.vendor');
        Route::get('/dashboard/booking', [BookingController::class, 'index'])->name('dashboard.booking');
        Route::get('/dashboard/wishlist', [WishlistController::class, 'index'])->name('dashboard.wishlist');
        Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
        Route::get('/dashboard/contacts', [ContactController::class, 'index'])->name('dashboard.contacts');
        // Route::get('/dashboard/tags', [TagController::class, 'index'])->name('dashboard.tag');
        Route::resource('users', UserController::class);
        Route::resource('userDetails', UserDetailController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('vendors', VendorController::class);
        // Route::resource('bookings', BookingController::class);
        Route::resource('wishlists', WishlistController::class);
        Route::resource('contacts', ContactController::class);

        Route::get('/admin-profile',function(){
           return view('dashboard.profile'); 
        });
    });

    // Common routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';