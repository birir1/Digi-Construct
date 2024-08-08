<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('frontend.user.userProfile');
    }

    public function show()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Pass the user data to the view
        return view('frontend.user.userProfile', compact('user'));
    }
}