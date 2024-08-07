<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SettingsController;

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
Route::get('/cartItems', [CartItemsController::class, 'index'])->name('cartItems');
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/payments', [PaymentsController::class, 'index'])->name('payments');
Route::get('/messages', [MessagesController::class, 'index'])->name('messages');
Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';