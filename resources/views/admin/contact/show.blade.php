@extends('admin.layout')

@section('title', 'Bericht bekijken – Admin Panel')

@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4;">
  <h1 style="color:#8B0000;">Bericht van {{ $message->name }}</h1>

  <div style="margin-top:2rem; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1); max-width:700px;">
    <p><strong>Naam:</strong> {{ $message->name }}</p>
    <p><strong>E-mail:</strong> <a href="mailto:{{ $message->email }}" style="color:#0066cc;">{{ $message->email }}</a></p>
    <p><strong>Onderwerp:</strong> {{ $message->subject }}</p>
    <p><strong>Bericht:</strong></p>
    <p style="white-space:pre-line;">{{ $message->message }}</p>

    <div style="margin-top:2rem; display:flex; justify-content:space-between;">
      <a href="{{ route('admin.contact.index') }}" style="text-decoration:none; color:#8B0000;">← Terug naar inbox</a>

      <form method="POST" action="{{ route('admin.contact.destroy', $message->id) }}"
            onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?')" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background:none; border:none; color:#c00; cursor:pointer;">
          Bericht verwijderen
        </button>
      </form>
    </div>
  </div>
</main>
@endsection
