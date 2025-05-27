@extends('layouts.app')

@section('title', 'Profiel bewerken – Pizzeria Antonio')

@section('content')
<main style="padding:2rem; max-width:700px; margin:2rem auto; background:#fff; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
  <h1 style="font-family:'Sigmar One', cursive; color:#8B0008; font-size:2rem; text-align:center; margin-bottom:2rem;">
    Profiel bewerken
  </h1>

  <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" style="display:flex; flex-direction:column; gap:1.5rem;">
    @csrf
    @method('PUT')

    <div>
      <label for="name" style="font-weight:bold;">Naam</label>
      <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="w-full border border-gray-300 rounded p-2">
      <x-error field="name" />
    </div>

    <div>
      <label for="username" style="font-weight:bold;">Gebruikersnaam</label>
      <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}" class="w-full border border-gray-300 rounded p-2">
      <x-error field="username" />
    </div>

    <div>
      <label for="email" style="font-weight:bold;">E-mail</label>
      <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full border border-gray-300 rounded p-2">
      <x-error field="email" />
    </div>

    <div>
      <label for="birthday" style="font-weight:bold;">Geboortedatum</label>
      <input id="birthday" name="birthday" type="date" value="{{ old('birthday', $user->birthday) }}" class="w-full border border-gray-300 rounded p-2">
      <x-error field="birthday" />
    </div>

    <div>
      <label for="about" style="font-weight:bold;">Over mij</label>
      <textarea id="about" name="about" rows="4" class="w-full border border-gray-300 rounded p-2">{{ old('about', $user->about) }}</textarea>
      <x-error field="about" />
    </div>

    <div>
      <label for="profile_picture" style="font-weight:bold;">Profielfoto</label>
      <input id="profile_picture" name="profile_picture" type="file" accept="image/*" class="w-full border border-gray-300 rounded p-2">
      <x-error field="profile_picture" />
    </div>

    <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap:1rem;">
      <button type="submit" style="background-color:#8B0008; color:white; padding:0.75rem 1.5rem; border:none; border-radius:6px; font-weight:bold; cursor:pointer;">
        Opslaan
      </button>
      <a href="{{ route('user.dashboard') }}" style="background-color:#ddd; color:#333; padding:0.75rem 1.5rem; border-radius:6px; text-decoration:none; font-weight:bold;">
        Terug naar mijn profiel
      </a>
    </div>
  </form>
</main>
@endsection
