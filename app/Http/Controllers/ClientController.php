<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function SinglProduct($slug){
        $product = Product::where('slug',$slug)->first();
        return view('home.single-product',compact('product'));
    }
    public function Category(){
        return view('home.category');
    }
    public function AddToCart(){
        return view('home.add-to-cart');
    }
    public function Checkout(){
        return view('home.checkout');
    }
    public function UserProfile(){
        return view('home.user-profile');
    }
    public function BestSeller(){
        return view('home.best-seller');
    }
    public function GiftIdeas(){
        return view('home.gift-ideas');
    }
    public function NewRelease(){
        return view('home.new-release');
    }
    public function TodaysDeal(){
        return view('home.todays-deal');
    }
    public function CustomerService(){
        return view('home.customer-service');
    }
}
