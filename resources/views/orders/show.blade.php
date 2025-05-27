@extends('layouts.app')

@section('title', 'Mijn Profiel – Pizzeria Antonio')

@section('content')
  <main style="padding:2rem; max-width:600px; margin:2rem auto; background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">
      Mijn Profiel
    </h1>

    @if(session('success'))
      <div style="background:#e0ffe0; color:#080; padding:1rem; border-radius:4px; margin-bottom:1.5rem;">
        {{ session('success') }}
      </div>
    @endif

    @if(auth()->user()->profile_picture)
      <div style="text-align:center; margin-bottom:1.5rem;">
        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
             alt="Profielfoto" style="width:150px; height:150px; object-fit:cover; border-radius:50%;">
      </div>
    @endif

    <p><strong>Naam:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Gebruikersnaam:</strong> {{ auth()->user()->username }}</p>
    <p><strong>E-mail:</strong> {{ auth()->user()->email }}</p>
    <p><strong>Geboortedatum:</strong> {{ auth()->user()->birthday ?? 'Niet opgegeven' }}</p>
    <p><strong>Over mij:</strong><br>{{ auth()->user()->about ?? 'Geen extra informatie.' }}</p>

    <div style="text-align:center; margin-top:2rem;">
      <x-button color="primary" onclick="location.href='{{ route('profile.edit') }}'">
        Profiel bewerken
      </x-button>
    </div>
  </main>
@endsection
