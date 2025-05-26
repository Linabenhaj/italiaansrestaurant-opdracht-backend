<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //niuewe bestelling opgeslagen
    public function store(Request $request)
    {
        // Valideer de invoer
        $data = $request->validate([
            'pizza'       => 'required|string|max:255',
            'opmerkingen' => 'nullable|string|max:1000',
        ]);

        // Maak de bestelling aan 
        Order::create([
            'user_id'     => $request->user()->id,
            'pizza'       => $data['pizza'],
            'opmerkingen' => $data['opmerkingen'] ?? null,
            'status'      => 'pending',  // of wat je eigen status-logica is
        ]);

        // Terug met succesmelding
        return back()->with('success', 'Je bestelling is ontvangen! Buon appetito 🍕');
    }
}
