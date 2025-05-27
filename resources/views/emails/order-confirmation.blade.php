
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Bestelbevestiging</title>
</head>
<body style="font-family:'Outfit',sans-serif; background:#fff; padding:2rem;">
  <h1 style="font-family:'Sigmar One',cursive; color:#8B0000;">Bedankt voor je bestelling!</h1>

  <p><strong>Ordernummer:</strong> {{ $order->id }}</p>
  <p><strong>Datum:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>

  <h2>Overzicht van je bestelling</h2>
  @php
    // probeer eerst $order->items, anders $order->orderItems of $order->pizzas
    $lineItems = $order->items ?? ($order->orderItems ?? ($order->pizzas ?? collect()));
  @endphp

  @if($lineItems->isEmpty())
    <p>Er zijn geen producten gevonden in je bestelling.</p>
  @else
    <ul>
      @foreach($lineItems as $item)
        <li style="margin-bottom:.5rem;">
          {{-- pas de volgende regel aan als je andere relation keys hebt --}}
          {{ $item->product->name ?? $item->name ?? 'Onbekend product' }}
          &times; {{ $item->quantity ?? $item->pivot->quantity ?? 1 }}
          — €{{ number_format($item->price ?? $item->pivot->price ?? 0, 2, ',', '.') }}
        </li>
      @endforeach
    </ul>
  @endif

  <p>Wij hopen dat je geniet van je bestelling!<br/>Met vriendelijke groet,<br/>Pizzeria Antonio</p>
</body>
</html>
