<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //alle bestellingen zien 
    public function index(Request $request)
    {
        
        $orders = Order::with(['user', 'pizzas'])
                       ->orderBy('created_at', 'desc')
                       ->paginate(10); // max tien is obverzichtelijker

        return view('admin.orders.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Bestelling verwijderd.');
    }

    public function show(Order $order)
{
    return view('admin.orders.show', compact('order'));
}

}
