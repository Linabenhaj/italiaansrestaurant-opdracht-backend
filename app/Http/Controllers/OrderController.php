<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Valideer dat er één pizza-id binnenkomt
        $data = $request->validate([
            'pizza' => 'required|exists:pizzas,id',
        ]);

        $user  = Auth::user();
        $pizza = Pizza::findOrFail($data['pizza']);

        // Maak een nieuwe bestelling aan
        $order = Order::create([
            'user_id'     => $user->id,
            'total_price' => $pizza->price,  
        ]);

        // Koppel de pizza met quantity=1 en unit-price
        $order->pizzas()->attach($pizza->id, [
            'quantity' => 1,
            'price'    => $pizza->price,
        ]);

        // Redirect naar “Mijn bestellingen”
        return redirect()
            ->route('orders.index')
            ->with('success', 'Pizza “'.$pizza->name.'” besteld!');
    }

    public function index()
    {
        $orders = Auth::user()
                      ->orders()
                      ->with('pizzas')
                      ->latest()
                      ->get();

        return view('orders.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        // controleer dat order bij deze user hoort
        $order->delete();
        return back()->with('success', 'Bestelling verwijderd.');
    }
}
