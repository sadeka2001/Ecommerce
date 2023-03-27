<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function cardArray(){
    $cartCollection = Cart::content();
    return  $cartCollection->toArray(); 
}

