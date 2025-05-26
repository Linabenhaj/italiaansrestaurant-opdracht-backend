<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //alle bestellingen op een rij voor de admin
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    //verijweren van bestaande bestellingen 
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with('success', 'Bestelling verwijderd.');
    }
}
