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
use App\Http\Controllers\LoggedUserController;
use App\Http\Controllers\ProductController;




Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/home', function () {
    return view('frontend.home');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/products', function () {
    return view('frontend.products');
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

// Route to show the user's profile
Route::get('/user-profile', [LoggedUserController::class, 'show'])->name('userProfile.show');


// Route to show the user's profile
Route::get('/user-profile/view', [LoggedUserController::class, 'show'])->name('userProfile.show');
Route::get('/user-profile/edit', [LoggedUserController::class, 'edit'])->name('userProfile.edit');
Route::put('/user-profile/update', [LoggedUserController::class, 'update'])->name('userProfile.update');
Route::delete('/user-profile/delete', [LoggedUserController::class, 'destroy'])->name('userProfile.destroy');


Route::get('/user-profile', [UserProfileController::class, 'index'])->name('userProfile');

Route::get('/user-profile', [UserProfileController::class, 'show'])->name('userProfile');



// web.php (routes file)

Route::get('/profile', [ProfileController::class, 'show'])->name('userProfile');



/*Products*/

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Display a specific product
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Create a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Edit a product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Delete a product
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';