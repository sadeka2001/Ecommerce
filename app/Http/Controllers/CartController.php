<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add_to_card(Request $request)
    {
        $quantity = $request->quantity;
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        $product_qty = $quantity;
        $product_id = $product->id;
        $product_name = $product->name;
        $product_price = $product->price;
        $product_image =[$product->image];

        Cart::add($product_id, $product_name, $product_qty, $product_price);
        // session()->flash('success_message', 'Item added in cart');
        cardArray();
        return redirect()->back();
    }
}
