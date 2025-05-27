@extends('admin.layout')
@section('title', 'Bestelling #'. $order->id .' – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Bestelling #{{ $order->id }}</h1>

  <div style="background:#fff; padding:2rem; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1); max-width:600px;">
    <p><strong>Gebruiker:</strong> {{ $order->user->name }}</p>
    <p><strong>E-mail:</strong> {{ $order->user->email }}</p>
    <p><strong>Datum:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>

    <div style="margin-top:1.5rem;">
      <strong>Details bestelling:</strong>
      <div style="margin-top:0.5rem; white-space:pre-wrap; background:#FFF4D6; padding:1rem; border-radius:5px; border:1px solid #ccc;">
        {{ $order->details }}
      </div>
    </div>

    <div style="margin-top:2rem;">
      <a href="{{ route('admin.orders.index') }}"
         style="color:#8B0000; text-decoration:none; font-weight:bold;">← Terug naar bestellingen</a>
    </div>
  </div>
</main>
@endsection
