<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        return view("home");
    }


    public function shop(){
        return view("shop");
    }

    public function about(){
        return view("about");
    }

    public function contact(){
        return view("contact");
    }

    public function cart(){
        return view("cart");
    }

    public function wishlist(){
        return view("wishlist");
    }

    public function detail(){
        return view("detail");
    }

    public function checkout(){
        return view("checkout");
    }
}
