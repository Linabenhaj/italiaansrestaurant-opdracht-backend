@extends('layouts.app')

@section('title', 'Contact – Pizzeria Antonio')

@section('content')
<main style="padding:2rem; max-width:500px; margin:3rem auto; background:#fff; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1); font-family:'Outfit', sans-serif;">
  <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">
    Contacteer ons
  </h1>

  @if(session('success'))
    <div style="background:#e6ffe6; color:#060; padding:1rem; border-radius:5px; margin-bottom:1rem;">
      {{ session('success') }}
    </div>
  @endif

  @if ($errors->any())
    <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
      <ul style="margin:0; padding-left:1.25rem;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('contact.submit') }}">
    @csrf

    <div style="margin-bottom:1rem;">
      <x-label for="name" value="Naam" />
      <x-input id="name" name="name" type="text" value="{{ old('name') }}" required />
      <x-invalid-feedback field="name" />
    </div>

    <div style="margin-bottom:1rem;">
      <x-label for="email" value="E-mailadres" />
      <x-input id="email" name="email" type="email" value="{{ old('email') }}" required />
      <x-invalid-feedback field="email" />
    </div>

    <div style="margin-bottom:1rem;">
      <x-label for="subject" value="Onderwerp" />
      <x-input id="subject" name="subject" type="text" value="{{ old('subject') }}" required />
      <x-invalid-feedback field="subject" />
    </div>

    <div style="margin-bottom:1.5rem;">
      <x-label for="message" value="Bericht" />
      <x-textarea id="message" name="message" rows="5" required>{{ old('message') }}</x-textarea>
      <x-invalid-feedback field="message" />
    </div>

    <x-button type="submit" color="primary" style="width:100%; background:#8B0000; padding:.75rem;">
      Verstuur bericht
    </x-button>
  </form>
</main>
@endsection
