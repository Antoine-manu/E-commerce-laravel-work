<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $cart = session()->get('cart', []);
        $items = [];
        $total = 0;
        foreach($cart as $index => $p){
            $return = [
                "name" => $p["name"],
                "quantity" => $p["quantity"],
                "price" => $p["price"],
                "total" => ($p["price"] * $p["quantity"]),
                "image" => $p["image"]
            ];
            $items[$index] = $return;
            $total += $return["total"];
        }
        return view('cart.index', ["products" => $items, "total" => $total]);
    }
}
