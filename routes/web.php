<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderHistoryController;

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/home', function () {
    return view('frontend.home');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/services', function () {
    return view('frontend.services');
});

Route::get('/reachout', function () {
    return view('frontend.reachout');
});

Route::get('/portfolio', function () {
    return view('frontend.portfolio');
});

Route::get('/logout', function () {
    return view('logout');
});

Route::get('/userProfile', function () {
    return view('frontend.user.userProfile');
});

// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/user-profile', [UserProfileController::class, 'index'])->name('userProfile');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/orderHistory', [OrderHistoryController::class, 'index'])->name('orderHistory');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';