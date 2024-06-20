<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function createOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        // Créer la commande
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart)),
            'status' => 'pending'
        ]);

        // Ajouter les éléments à la commande
        foreach ($cart as $productId => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $details['quantity'],
                'price' => $details['price']
            ]);
        }

        // Vider le panier
        session()->forget('cart');

        return redirect()->route('order.success', ['orderId' => $order->id])->with('success', 'Commande passée avec succès.');
    }

    public function orderSuccess($orderId)
    {
        $order = Order::with('orderItems.product')->findOrFail($orderId);
        return view('order.success', compact('order'));
    }

}
