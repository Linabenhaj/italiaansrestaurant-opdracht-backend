{{-- resources/views/contact/form.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact – Pizzeria Antonio')

@section('content')
<main class="max-w-xl mx-auto px-4 py-8 bg-white rounded shadow">
  <h1 class="text-3xl font-sigmar text-red-800 text-center mb-6">Contacteer ons</h1>

  @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
    @csrf

    <div>
      <label for="name" class="block font-medium mb-1">Naam</label>
      <input id="name" name="name" type="text" value="{{ old('name') }}" required class="w-full border-gray-300 rounded p-2">
      <x-error field="name" />
    </div>

    <div>
      <label for="email" class="block font-medium mb-1">E-mailadres</label>
      <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full border-gray-300 rounded p-2">
      <x-error field="email" />
    </div>

    <div>
      <label for="subject" class="block font-medium mb-1">Onderwerp</label>
      <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required class="w-full border-gray-300 rounded p-2">
      <x-error field="subject" />
    </div>

    <div>
      <label for="message" class="block font-medium mb-1">Bericht</label>
      <textarea id="message" name="message" rows="6" required class="w-full border-gray-300 rounded p-2">{{ old('message') }}</textarea>
      <x-error field="message" />
    </div>

    <x-button type="submit" color="primary" class="w-full">Verstuur bericht</x-button>
  </form>
</main>
@endsection