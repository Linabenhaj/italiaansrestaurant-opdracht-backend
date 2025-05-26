<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Nieuwsbeheer – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; height:100vh; background:#FFF7D4;">
@include('admin.partials.sidebar')


  {{-- Main content --}}
  <main style="flex:1; padding:2rem; overflow-y:auto;">
    <h1 style="color:#8B0000;">Nieuwsbeheer</h1>
    <p style="color:#555;">Beheer hier alle nieuwsitems:</p>

    <a href="{{ route('admin.news.create') }}"
       style="display:inline-block; margin:1rem 0; background:#8B0000; color:#fff; padding:0.5rem 1rem; border-radius:5px; text-decoration:none;">
      + Voeg nieuws toe
    </a>

    <table style="width:100%; border-collapse:collapse;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:0.75rem; text-align:left;">Titel</th>
          <th style="padding:0.75rem; text-align:left;">Datum</th>
          <th style="padding:0.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $item)
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:0.75rem;">{{ $item->title }}</td>
          <td style="padding:0.75rem;">{{ $item->published_at->format('d-m-Y') }}</td>
          <td style="padding:0.75rem;">
            <a href="{{ route('admin.news.edit', $item) }}" style="margin-right:0.5rem; color:#0066cc;">Bewerk</a>
            <form method="POST" action="{{ route('admin.news.destroy', $item) }}" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" style="background:none;border:none;color:#c00;cursor:pointer;">Verwijder</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{-- Paginatie --}}
    <div style="margin-top:1rem; text-align:center;">
      {{ $items->links() }}
    </div>
  </main>
</body>
</html>
