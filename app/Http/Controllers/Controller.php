<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function home(){
        return view("frontend.home");
    }

    public function about(){
        return view("frontend.about");
    }

    public function services(){
        return view("frontend.services");
    }

    public function portfolio(){
        return view("frontend.portfolio");
    }

    public function reachout(){
        return view("frontend.reachout");
    }

    public function payment(){
        return view("frontend.payment");
    }

    public function userProfile()
    {
        return view('frontend.user.userProfile');
    }

    public function index()
    {
        return view('frontend.user.products');
    }
}