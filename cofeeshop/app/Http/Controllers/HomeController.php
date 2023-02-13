<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $products=Product::all();
        return view('home',compact('products',$products)); 
    }
}
