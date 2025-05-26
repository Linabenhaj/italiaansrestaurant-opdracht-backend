<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inloggen – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
</head>
<body style="margin:0; font-family:'Outfit', sans-serif; background:#FFF7D4;">

  {{-- Header & Navigatie --}}
  @include('partials.header')
  @include('partials.navbar')

  <main style="padding:2rem; max-width:400px; margin:3rem auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One', cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">
      Inloggen
    </h1>

    {{-- Foutmeldingen --}}
    @if ($errors->any())
      <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
        <ul style="margin:0; padding-left:1.25rem;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      {{-- Email --}}
      <div style="margin-bottom:1rem;">
        <label for="email" style="display:block; margin-bottom:.5rem;">E-mailadres</label>
        <input
          id="email"
          type="email"
          name="email"
          value="{{ old('email') }}"
          required
          autofocus
          style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:4px;"
        >
      </div>

      {{-- Wachtwoord --}}
      <div style="margin-bottom:1rem;">
        <label for="password" style="display:block; margin-bottom:.5rem;">Wachtwoord</label>
        <input
          id="password"
          type="password"
          name="password"
          required
          style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:4px;"
        >
      </div>

      {{-- Onthoud mij + Wachtwoord vergeten --}}
      <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
        <label style="font-size:.9rem;">
          <input type="checkbox" name="remember"> Onthoud mij
        </label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" style="font-size:.9rem; color:#8B0000; text-decoration:none;">
            Wachtwoord vergeten?
          </a>
        @endif
      </div>

      {{-- Submit knop --}}
      <button type="submit"
              style="width:100%; background:#8B0000; color:#fff; padding:.75rem; border:none; border-radius:5px; font-size:1rem; cursor:pointer;">
        Inloggen
      </button>

      {{-- Link naar registratie --}}
      <p style="text-align:center; margin-top:1rem; font-size:.9rem;">
        Nog geen account?
        <a href="{{ route('register') }}" style="color:#8B0000; text-decoration:none; font-weight:600;">
          Registreer hier
        </a>
      </p>
      
      <div style="text-align:right; margin-bottom:1rem;">
  <a href="{{ route('password.request') }}" style="font-size:.9rem; color:#8B0000; text-decoration:none;">
    Wachtwoord vergeten?
  </a>
</div>

    </form>
  </main>

  {{-- Footer --}}
  @include('partials.footer')
</body>
</html>
