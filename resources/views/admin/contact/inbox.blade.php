@extends('admin.layout')

@section('title', 'Contact Inbox – Admin Panel')

@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto;">
  <h1 style="color:#8B0000;">Inbox Contactberichten</h1>
  <p style="color:#555;">Hieronder zie je alle ontvangen berichten van gebruikers.</p>

  @if(session('success'))
    <div style="background:#e0ffe0; color:#006600; padding:1rem; border-radius:5px; margin-top:1rem;">
      {{ session('success') }}
    </div>
  @endif

  @if($messages->isEmpty())
    <p style="margin-top:1rem; color:#777;"><em>Er zijn momenteel geen berichten.</em></p>
  @else
    <table style="width:100%; border-collapse:collapse; margin-top:1rem;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:.75rem; text-align:left;">Naam</th>
          <th style="padding:.75rem; text-align:left;">E-mail</th>
          <th style="padding:.75rem; text-align:left;">Onderwerp</th>
          <th style="padding:.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        @foreach($messages as $message)
          <tr style="border-bottom:1px solid #ccc;">
            <td style="padding:.75rem;">{{ $message->name }}</td>
            <td style="padding:.75rem;">{{ $message->email }}</td>
            <td style="padding:.75rem;">{{ $message->subject }}</td>
            <td style="padding:.75rem;">
              <a href="{{ route('admin.contact.show', $message->id) }}"
                 style="color:#0066cc; text-decoration:none; margin-right:1rem;">Bekijk</a>

              <form method="POST"
                    action="{{ route('admin.contact.destroy', $message->id) }}"
                    style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')"
                        style="background:none; border:none; color:#c00; cursor:pointer; padding:0;">
                  Verwijder
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</main>
@endsection
