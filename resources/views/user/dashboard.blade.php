<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Gebruikersdashboard – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  {{-- Main nav / header --}}
  @include('partials.header')
  @include('partials.navbar')

  <main style="padding:2rem; max-width:800px; margin:2rem auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1rem;">Dashboard Gebruiker</h1>

    <section style="display:flex; gap:2rem; align-items:center; margin-bottom:2rem;">
      @if($user->profile_picture)
        <img src="{{ asset('storage/'.$user->profile_picture) }}"
             alt="Profielfoto {{ $user->name }}"
             style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
      @else
        <div style="width:120px; height:120px; background:#eee; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#777;">
          Geen foto
        </div>
      @endif

      <div>
        <p><strong>Naam:</strong> {{ $user->name }}</p>
        <p><strong>Gebruikersnaam:</strong> {{ $user->username }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
      </div>
    </section>

    <section style="margin-bottom:2rem; background:#fffef6; padding:1rem; border-radius:6px;">
      <h2 style="color:#8B0000; margin-bottom:.5rem;">Persoonlijke gegevens</h2>
      <p><strong>Geboortedatum:</strong> {{ $user->birthday ?? 'Niet opgegeven' }}</p>
      <p><strong>Over mij:</strong> {{ $user->about ?? 'Geen extra info' }}</p>
    </section>

    <div style="text-align:right;">
      <a href="{{ route('profile.edit', $user->username) }}"
         style="background:#8B0000; color:#fff; padding:.5rem 1rem; border-radius:5px; text-decoration:none;">
        Profiel bewerken
      </a>
    </div>
  </main>

  <footer style="background:#8B0000; color:#fff; padding:1rem; text-align:center; font-size:.9rem;">
    © 2025 Pizzeria Antonio | Alle rechten voorbehouden
  </footer>
</body>
</html>
