@extends('layouts.app')

@section('title', $user->name.' – Profiel')

@section('content')
<main style="padding:2rem; max-width:600px; margin:2rem auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
  <h1 style="font-family:'Sigmar One',cursive; color:#8B0008; margin-bottom:1rem;">
    {{ $user->name }}
  </h1>

  <div style="text-align:center; margin-bottom:2rem;">
    @if($user->profile_picture)
      <img src="{{ asset('storage/'.$user->profile_picture) }}"
           alt="{{ $user->name }}"
           style="width:160px; height:160px; object-fit:cover; border-radius:50%;">
    @else
      <div style="width:160px; height:160px; background:#eee; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; color:#777;">
        Geen profielfoto
      </div>
    @endif
  </div>

  <p><strong>Gebruikersnaam:</strong> {{ $user->username }}</p>
  <p><strong>E-mail:</strong> {{ $user->email }}</p>
  <p><strong>Geboortedatum:</strong> {{ $user->birthday ?? 'Niet opgegeven' }}</p>
  <p><strong>Over mij:</strong> {{ $user->about ?? 'Geen extra info' }}</p>

  {{-- Terugknop --}}
  <div style="margin-top:2rem; text-align:center;">
    <a href="{{ route('home') }}"
       style="display:inline-block; color:#8B0008; font-weight:bold; text-decoration:none; background:#FFF7D4; border:1px solid #8B0008; padding:.5rem 1rem; border-radius:6px;">
      &larr; Terug naar Home
    </a>
  </div>
</main>
@endsection
