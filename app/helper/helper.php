<?php

function CardArray(){
    $cartCollection=\Cart::Content();
    return  $cartCollection->toArray();
}

