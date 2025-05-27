{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Registreren – Pizzeria Antonio')

@section('content')
  <main style="padding:2rem; max-width:500px; margin:3rem auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">
      Account aanmaken
    </h1>

    @if ($errors->any())
      <div style="background:#ffe6e6; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
        <ul style="margin:0; padding-left:1.25rem;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" style="display:grid; gap:1rem;">
      @csrf

      <div>
        <label for="name" style="font-weight:600;">Naam</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:5px;">
      </div>

      <div>
        <label for="username" style="font-weight:600;">Gebruikersnaam</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}" required
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:5px;">
      </div>

      <div>
        <label for="email" style="font-weight:600;">E-mailadres</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:5px;">
      </div>

      <div>
        <label for="password" style="font-weight:600;">Wachtwoord</label>
        <input type="password" name="password" id="password" required
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:5px;">
      </div>

      <div>
        <label for="password_confirmation" style="font-weight:600;">Herhaal wachtwoord</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:5px;">
      </div>

      <div>
        <label for="birthday" style="font-weight:600;">Geboortedatum</label>
        <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}"
               style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:5px;">
      </div>

      <div>
        <label for="profile_picture" style="font-weight:600;">Profielfoto</label>
        <input type="file" name="profile_picture" id="profile_picture"
               style="width:100%; padding:.5rem;">
      </div>

      <div>
        <label for="about" style="font-weight:600;">Over mij</label>
        <textarea name="about" id="about" rows="4"
                  style="width:100%; padding:.75rem; border:1px solid #ccc; border-radius:5px;">{{ old('about') }}</textarea>
      </div>

      <button type="submit"
              style="width:100%; background:#8B0000; color:#fff; padding:.75rem; border:none; border-radius:5px; font-size:1rem; cursor:pointer;">
        Registreren
      </button>

      <p style="text-align:center; margin-top:1rem; font-size:.9rem;">
        Al een account?
        <a href="{{ route('login') }}" style="color:#8B0000; text-decoration:none; font-weight:600;">
          Log hier in
        </a>
      </p>
    </form>
  </main>
@endsection
