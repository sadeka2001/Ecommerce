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
        $product= Product::where('id', $id)->first();
        $data['qty'] = $quantity;
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data ['price']= $product->price;
        $data ['attributes']=[$product->image];

        Cart::add($data);
        // session()->flash('success_message', 'Item added in cart');
        cardArray();
        return redirect()->back();
    }
    public function delete_cart($id){
        $cart = Cart::content()->where('rowId',$id);
        if($cart->isNotEmpty()){
        Cart::remove( $id);
        return redirect()->back();


    }
}
}
