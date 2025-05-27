@extends('layouts.user')

@section('title', 'Mijn bestellingen')

@section('content')
  <div style="max-width:800px; margin:2rem auto;">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">
      Mijn bestellingen
    </h1>

    @if(session('success'))
      <div style="background:#e6ffe6; color:#060; padding:1rem; border-radius:5px; margin-bottom:1rem;">
        {{ session('success') }}
      </div>
    @endif

    @if($orders->isEmpty())
      <p style="text-align:center; color:#777;">Je hebt nog geen bestellingen geplaatst.</p>
    @else
      <table style="width:100%; border-collapse:collapse; margin-bottom:1.5rem;">
        <thead>
          <tr style="background:#ffeaea;">
            <th style="padding:.75rem; text-align:left;">#</th>
            <th style="padding:.75rem; text-align:left;">Items</th>
            <th style="padding:.75rem; text-align:left;">Totaal</th>
            <th style="padding:.75rem; text-align:left;">Datum</th>
            <th style="padding:.75rem; text-align:left;">Acties</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            @php $linePizzas = $order->pizzas ?? collect(); @endphp
            <tr style="border-bottom:1px solid #ddd;">
              <td style="padding:.75rem;">{{ $order->id }}</td>
              <td style="padding:.75rem;">
                <ul style="margin:0; padding-left:1rem; list-style:disc;">
                  @foreach($linePizzas as $pizza)
                    <li>
                      {{ $pizza->name }} × {{ $pizza->pivot->quantity }} —
                      €{{ number_format($pizza->pivot->price * $pizza->pivot->quantity,2,',','.') }}
                    </li>
                  @endforeach
                </ul>
              </td>
              <td style="padding:.75rem;">
                € {{ number_format($order->total_price,2,',','.') }}
              </td>
              <td style="padding:.75rem;">
                {{ $order->created_at->format('d-m-Y H:i') }}
              </td>
              <td style="padding:.75rem; white-space:nowrap;">
                <form action="{{ route('orders.destroy', $order) }}"
                      method="POST"
                      onsubmit="return confirm('Weet je zeker dat je je bestelling wilt verwijderen?');"
                      style="display:inline;">
                  @csrf @method('DELETE')
                  <x-button color="danger" size="sm">Verwijderen</x-button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection