@extends('admin.layout')
@section('title', 'Pizza’s Beheren – Admin Panel')

@section('content')
<main style="padding:2rem;">
  <h1 style="color:#8B0000;">Pizza-overzicht</h1>

  <a href="{{ route('admin.pizzas.create') }}"
     style="display:inline-block; background:#8B0000; color:white; padding:0.5rem 1rem; border-radius:5px; margin:1rem 0;">
    Nieuwe Pizza
  </a>

  @if($pizzas->isEmpty())
    <p style="color:#555;">Geen pizza’s gevonden.</p>
  @else
    <table style="width:100%; border-collapse:collapse; margin-top:1rem;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:.75rem;">Foto</th>
          <th style="padding:.75rem;">Naam</th>
          <th style="padding:.75rem;">Prijs</th>
          <th style="padding:.75rem;">Acties</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pizzas as $pizza)
          <tr style="border-bottom:1px solid #ccc;">
            <td style="padding:.75rem;">
              @if($pizza->image_path)
                <img src="{{ asset('storage/'.$pizza->image_path) }}" alt="Pizza" style="width:60px; height:60px; object-fit:cover; border-radius:5px;">
              @endif
            </td>
            <td style="padding:.75rem;">{{ $pizza->name }}</td>
            <td style="padding:.75rem;">&euro;{{ number_format($pizza->price, 2, ',', '.') }}</td>
            <td style="padding:.75rem;">
              <a href="{{ route('admin.pizzas.edit', $pizza) }}" style="color:#0066cc;">Bewerk</a>
              <form method="POST" action="{{ route('admin.pizzas.destroy', $pizza) }}" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" style="color:#c00; background:none; border:none; cursor:pointer;"
                        onclick="return confirm('Pizza verwijderen?')">Verwijder</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div style="margin-top:1rem;">{{ $pizzas->links() }}</div>
  @endif
</main>
@endsection
