<?php

namespace App\Http\Controllers;

use cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function add_to_card(Request $request)
    {
        $quantity = $request->quantity;
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        $data['quantity'] = $quantity;
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['attribute'] =[$product->image];

        \Cart::add($data);
        CardArray();
        return redirect()->back();
    }
}
