@extends('layouts.user')

@section('page-title', 'Mijn Profiel')

@section('dashboard-content')
  <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6 space-y-6">
    <h1 class="font-sigmar text-2xl text-red-900 text-center mb-4">Mijn Profiel</h1>

    <div class="flex flex-col items-center space-y-4">
      @if(auth()->user()->profile_picture)
        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
             alt="Profielfoto"
             class="w-32 h-32 rounded-full object-cover border-2 border-gray-300">
      @else
        <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
          Geen foto
        </div>
      @endif

      <p><strong>Naam:</strong> {{ auth()->user()->name }}</p>
      <p><strong>Gebruikersnaam:</strong> {{ auth()->user()->username }}</p>
      <p><strong>E-mail:</strong> {{ auth()->user()->email }}</p>
      <p><strong>Geboortedatum:</strong>
        {{ auth()->user()->birthday ? auth()->user()->birthday->format('d-m-Y') : 'Niet opgegeven' }}
      </p>
      <p><strong>Over mij:</strong> {{ auth()->user()->about ?: 'Geen extra info' }}</p>
    </div>

    <div class="text-center">
      <x-button color="primary" onclick="location.href='{{ route('user.edit', auth()->user()) }}'">
  Profiel bewerken
</x-button>

    </div>
  </div>
@endsection
