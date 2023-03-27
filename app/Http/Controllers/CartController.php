<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Sizes;
use App\Models\Units;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function add_to_card(Request $request)
    {
        $quantity = $request->qty;
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        $data['qty'] = $quantity;
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['attribute'] =[$product->image];

        Cart::add($data);
        CardArray();
        return redirect()->back();
        //return redirect('/show_cart');
    }

    public function show_cart(){
        $categories = Category::all();
        $subcategories = \App\Models\Sub_Category::all();
        $brands = Brand::all();
        $units = Units::all();
        $sizes = Sizes::all();
        $colors = Color::all();
        $products = Product::where('status',1)->latest()->limit(12)->get();
        return view('Fronted.Pages.cart', compact('categories', 'subcategories', 'brands', 'units', 'sizes', 'colors','products'));

    }
}
