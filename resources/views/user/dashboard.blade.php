@extends('layouts.user')

@section('content')
  <div style="background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1); padding:2rem;">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1rem;">
      Dashboard Gebruiker
    </h1>

    <section style="display:flex; gap:2rem; align-items:center; margin-bottom:2rem;">
      @if(auth()->user()->profile_picture)
        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
             alt="Profielfoto" style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
      @else
        <div style="width:120px; height:120px; background:#eee; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#777;">
          Geen foto
        </div>
      @endif

      <div>
        <p><strong>Naam:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Gebruikersnaam:</strong> {{ auth()->user()->username }}</p>
        <p><strong>E-mail:</strong> {{ auth()->user()->email }}</p>
      </div>
    </section>

    <section style="background:#fffef6; padding:1rem; border-radius:6px; margin-bottom:2rem;">
      <h2 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:.5rem;">Persoonlijke gegevens</h2>
      <p>
        <strong>Geboortedatum:</strong>
        {{ auth()->user()->birthday ? \Carbon\Carbon::parse(auth()->user()->birthday)->format('d-m-Y') : 'Niet opgegeven' }}
      </p>
      <p><strong>Over mij:</strong> {{ auth()->user()->about ?? 'Geen extra info' }}</p>
    </section>

    <div style="text-align:right;">
      <x-button color="primary" onclick="location.href='{{ route('user.edit') }}'">
        Profiel bewerken
      </x-button>
    </div>
  </div>
@endsection
