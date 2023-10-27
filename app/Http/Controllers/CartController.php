<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    $jsonData = $request->getContent();
    $cart = json_decode($jsonData, true);


    return response()->json(['message' => 'Items added to cart']);
}

public function viewCart()
{
    $cart = session('cart', []);

    return view('cart', ['cart' => $cart]);
}



}
