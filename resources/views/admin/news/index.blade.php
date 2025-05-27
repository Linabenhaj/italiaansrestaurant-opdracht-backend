@extends('admin.layout')
@section('title', 'Nieuwsbeheer – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Nieuwsbeheer</h1>
  <p style="color:#555;">Beheer hier alle nieuwsitems:</p>

  <x-button href="{{ route('admin.news.create') }}" color="primary"
            style="display:inline-block; margin:1rem 0; background:#8B0000; color:#fff; padding:0.5rem 1rem; border-radius:5px; text-decoration:none;">
    + Voeg nieuws toe
  </x-button>

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
          <a href="{{ route('admin.news.edit', $item) }}"
             style="margin-right:0.5rem; color:#0066cc; text-decoration:none;">
            Bewerk
          </a>
          <form method="POST" action="{{ route('admin.news.destroy', $item) }}" style="display:inline;">
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

  <div style="margin-top:1rem; text-align:center;">
    {{ $items->links() }}
  </div>
</main>
@endsection
