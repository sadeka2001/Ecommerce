<?php

use cart;
function CardArray(){
    $cartCollection=\Cart::getContent();
    return  $cartCollection->toArray();
}

