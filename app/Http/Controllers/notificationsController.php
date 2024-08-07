<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificationsController extends Controller
{
    public function index()
    {
        return view('frontend.user.notifications');
    }
}