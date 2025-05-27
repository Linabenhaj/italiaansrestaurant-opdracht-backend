@extends('layouts.app')

@section('title', 'Profiel bewerken – Pizzeria Antonio')

@section('content')
  <main class="p-8 max-w-xl mx-auto bg-white rounded-lg shadow">
    <h1 class="font-sigmar text-2xl text-red-900 text-center mb-6">Profiel bewerken</h1>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label for="name" class="font-semibold block mb-1">Naam</label>
        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2">
        <x-error field="name" />
      </div>

      <div>
        <label for="username" class="font-semibold block mb-1">Gebruikersnaam</label>
        <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}" class="w-full border rounded p-2">
        <x-error field="username" />
      </div>

      <div>
        <label for="email" class="font-semibold block mb-1">E-mail</label>
        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2">
        <x-error field="email" />
      </div>

      <div>
        <label for="birthday" class="font-semibold block mb-1">Geboortedatum</label>
        <input id="birthday" name="birthday" type="date" value="{{ old('birthday', $user->birthday) }}" class="w-full border rounded p-2">
        <x-error field="birthday" />
      </div>

      <div>
        <label for="about" class="font-semibold block mb-1">Over mij</label>
        <textarea id="about" name="about" rows="4" class="w-full border rounded p-2">{{ old('about', $user->about) }}</textarea>
        <x-error field="about" />
      </div>

      <div>
        <label for="profile_picture" class="font-semibold block mb-1">Profielfoto</label>
        <input id="profile_picture" name="profile_picture" type="file" accept="image/*" class="w-full">
        <x-error field="profile_picture" />
      </div>

      <div class="flex justify-between">
        <x-button type="submit" color="primary">Opslaan</x-button>
        <x-button href="{{ route('user.dashboard') }}" color="secondary">Annuleren</x-button>
      </div>
    </form>
  </main>
@endsection
