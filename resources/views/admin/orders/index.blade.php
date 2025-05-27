@extends('admin.layout')
@section('title', 'Bestellingen – Pizzeria Antonio')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Bestellingen</h1>

  <table style="width:100%; border-collapse:collapse; margin-top:1rem;">
    <thead style="background:#ffeaea;">
      <tr>
        <th style="padding:0.75rem; text-align:left;">Order ID</th>
        <th style="padding:0.75rem; text-align:left;">Gebruiker</th>
        <th style="padding:0.75rem; text-align:left;">Details</th>
        <th style="padding:0.75rem; text-align:left;">Datum</th>
        <th style="padding:0.75rem; text-align:left;">Acties</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr style="border-bottom:1px solid #ccc;">
        <td style="padding:0.75rem;">{{ $order->id }}</td>
        <td style="padding:0.75rem;">{{ $order->user->name }}</td>
        <td style="padding:0.75rem;">{{ Str::limit($order->details, 40) }}</td>
        <td style="padding:0.75rem;">{{ $order->created_at->format('d-m-Y') }}</td>
        <td style="padding:0.75rem;">
          <form method="POST" action="{{ route('admin.orders.destroy', $order) }}" style="display:inline;">
            @csrf @method('DELETE')
            <x-button type="submit" color="danger"
                      style="background:none; border:none; color:#c00; cursor:pointer; padding:0;">
              Verwijder
            </x-button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</main>
@endsection
