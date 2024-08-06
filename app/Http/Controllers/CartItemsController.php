<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartItemsController extends Controller
{
    public function index()
    {
        return view('frontend.user.cartItems');
    }
}