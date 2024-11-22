<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;

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

// Route::get('/dashboard/user', [UserController::class, 'index'])->name('dashboard.user');
// Route::resource('users', UserController::class);

Route::middleware('auth')->group(function () {

    // Admin-specific routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard/user', [UserController::class, 'index'])->name('dashboard.user');
        Route::get('/dashboard/service', [ServiceController::class, 'index'])->name('dashboard.service');
        Route::get('/dashboard/contacts', [ContactController::class, 'index'])->name('dashboard.contacts');
        // Route::get('/dashboard/tags', [TagController::class, 'index'])->name('dashboard.tag');
        Route::resource('users', UserController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('contacts', ContactController::class);
    });

    // Common routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';