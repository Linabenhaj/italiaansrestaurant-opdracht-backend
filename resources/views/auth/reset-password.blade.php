@extends('layouts.app')

@section('title', 'Wachtwoord opnieuw instellen – Pizzeria Antonio')

@section('content')
  <main class="max-w-md mx-auto bg-white p-8 mt-10 rounded-lg shadow">
    <h1 class="font-sigmar text-2xl text-red-900 text-center mb-6">
      Nieuw wachtwoord instellen
    </h1>

    @if ($errors->any())
      <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
      @csrf
      <input type="hidden" name="token" value="{{ request()->route('token') }}">

      <div>
        <label for="email" class="block font-semibold mb-1">E-mailadres</label>
        <input
          id="email"
          type="email"
          name="email"
          value="{{ old('email') }}"
          required
          class="w-full border rounded p-2"
        >
        <x-error field="email" />
      </div>

      <div>
        <label for="password" class="block font-semibold mb-1">Nieuw wachtwoord</label>
        <input
          id="password"
          type="password"
          name="password"
          required
          class="w-full border rounded p-2"
        >
        <x-error field="password" />
      </div>

      <div>
        <label for="password_confirmation" class="block font-semibold mb-1">Bevestig wachtwoord</label>
        <input
          id="password_confirmation"
          type="password"
          name="password_confirmation"
          required
          class="w-full border rounded p-2"
        >
      </div>

      <x-button type="submit" color="primary" class="w-full justify-center">
        Opslaan
      </x-button>

      <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-red-800 hover:underline text-sm">← Terug naar inloggen</a>
      </div>
    </form>
  </main>
@endsection
