<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>{{ $user->name }} – Profiel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0;font-family:'Outfit',sans-serif;background:#FFF7D4;">

  @include('partials.header')
  @include('partials.navbar')

  <main style="padding:2rem; max-width:600px; margin:2rem auto;background:#fff;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One',cursive;color:#8B0000;margin-bottom:1rem;">{{ $user->name }}</h1>

    <div style="text-align:center;margin-bottom:2rem;">
      @if($user->profile_picture)
        <img src="{{ asset('storage/'.$user->profile_picture) }}"
             alt="{{ $user->name }}"
             style="width:160px;height:160px;object-fit:cover;border-radius:50%;">
      @else
        <div style="width:160px;height:160px;background:#eee;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;color:#777;">
          Geen profielfoto
        </div>
      @endif
    </div>

    <p><strong>Gebruikersnaam:</strong> {{ $user->username }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Geboortedatum:</strong> {{ $user->birthday ?? 'Niet opgegeven' }}</p>
    <p><strong>Over mij:</strong> {{ $user->about ?? 'Geen extra info' }}</p>
  </main>

  <footer style="background:#8B0000;color:#fff;padding:2rem 1rem;text-align:center;">
    © 2025 Pizzeria Antonio | Alle rechten voorbehouden
  </footer>
</body>
</html>
