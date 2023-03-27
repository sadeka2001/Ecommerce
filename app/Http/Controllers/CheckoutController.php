<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Sizes;
use App\Models\Units;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
   public function index(){
    //return view('Fronted.Pages.checkout');
   $categories = Category::all();
   $subcategories = \App\Models\Sub_Category::all();
   $brands = Brand::all();
   $units = Units::all();
   $sizes = Sizes::all();
   $colors = Color::all();
   $products = Product::where('status',1)->latest()->limit(12)->get();
   return view('Fronted.Pages.checkout', compact('categories', 'subcategories', 'brands', 'units', 'sizes', 'colors','products'));
}
public function login_check(){
    $categories = Category::all();
    $subcategories = \App\Models\Sub_Category::all();
    $brands = Brand::all();
    $units = Units::all();
    $sizes = Sizes::all();
    $colors = Color::all();
    $products = Product::where('status',1)->latest()->limit(12)->get();
    return view('Fronted.Pages.login_check',compact('categories', 'subcategories', 'brands', 'units', 'sizes', 'colors','products'));
}
}
