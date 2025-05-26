<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Contact – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  {{-- Header & Navigation --}}
  @include('partials.header')
  @include('partials.navbar')

  <main style="padding:2rem; max-width:500px; margin:3rem auto; background:#fff; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
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
        <label for="name" style="display:block; margin-bottom:.5rem;">Naam</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:4px;">
      </div>

      <div style="margin-bottom:1rem;">
        <label for="email" style="display:block; margin-bottom:.5rem;">E-mailadres</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:4px;">
      </div>

      <div style="margin-bottom:1rem;">
        <label for="subject" style="display:block; margin-bottom:.5rem;">Onderwerp</label>
        <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:4px;">
      </div>

      <div style="margin-bottom:1.5rem;">
        <label for="message" style="display:block; margin-bottom:.5rem;">Bericht</label>
        <textarea id="message" name="message" rows="5" required
                  style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:4px;">{{ old('message') }}</textarea>
      </div>

      <button type="submit"
              style="width:100%; background:#8B0000; color:#fff; padding:.75rem; border:none; border-radius:5px; font-size:1rem; cursor:pointer;">
        Verstuur bericht
      </button>

      <label for="email">E-mail</label>
<input id="email" name="email" type="email" value="{{ old('email') }}" required>
<x-invalid-feedback field="email"/>

    </form>
  </main>

  {{-- Footer --}}
  @include('partials.footer')
</body>
</html>
