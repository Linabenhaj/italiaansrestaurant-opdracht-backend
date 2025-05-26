<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bestellingen – Pizzeria Antonio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; height:100vh; background:#FFF7D4;">

 @include('admin.partials.sidebar')


  {{-- Main content --}}
  <main style="flex:1; padding:2rem; overflow-y:auto;">
    <h1 style="color:#8B0000;">Bestellingen</h1>

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
          <td style="padding:0.75rem;">{{ Str::limit($order->details,40) }}</td>
          <td style="padding:0.75rem;">{{ $order->created_at->format('d-m-Y') }}</td>
          <td style="padding:0.75rem;">
            <form method="POST" action="{{ route('admin.orders.destroy', $order) }}" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit">Verwijder</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>
</body>
</html>
