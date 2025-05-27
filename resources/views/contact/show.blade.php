{{-- resources/views/contact/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Contactbericht bekijken')

@section('content')
<main style="padding:2rem; max-width:600px; margin:2rem auto; background:#fff; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.05);">
  <h1 style="color:#8B0000; font-size:1.75rem; margin-bottom:1rem;">Contactbericht</h1>

  <div style="margin-bottom:1rem;">
    <p><strong>Naam:</strong> {{ $message->name }}</p>
    <p><strong>E-mailadres:</strong> {{ $message->email }}</p>
    <p><strong>Onderwerp:</strong> {{ $message->subject }}</p>
  </div>

  <div>
    <h2 style="margin-bottom:.5rem; color:#8B0000;">Bericht</h2>
    <p style="white-space:pre-wrap;">{{ $message->message }}</p>
  </div>

  <div style="margin-top:1.5rem;">
    <x-button color="secondary" onclick="location.href='{{ route('home') }}'">Terug naar home</x-button>
  </div>
</main>
@endsection