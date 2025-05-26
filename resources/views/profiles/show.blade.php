<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>{{ $user->name }} – Profiel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  @include('partials.header')
  @include('partials.navbar')

  <main style="padding:2rem; max-width:600px; margin:2rem auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
    <a href="{{ route('profiles.index') }}" style="color:#8B0000; text-decoration:none; font-weight:600;">&larr; Terug naar profielen</a>

    <section style="text-align:center; margin-top:1.5rem;">
      @if($user->profile_picture)
        <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="{{ $user->name }}"
             style="width:120px; height:120px; object-fit:cover; border-radius:50%; margin-bottom:1rem;">
      @else
        <div style="width:120px; height:120px; background:#eee; border-radius:50%; margin:0 auto 1rem;"></div>
      @endif

      <h1 style="font-family:'Sigmar One',cursive; color:#8B0000;">{{ $user->name }}</h1>
      <p style="color:#555;">@<strong>{{ $user->username }}</strong></p>
    </section>

    <section style="margin-top:2rem;">
      <p><strong>Email:</strong> {{ $user->email }}</p>
      <p><strong>Geboortedatum:</strong> {{ $user->birthday ?? 'Niet opgegeven' }}</p>
      <p><strong>Over mij:</strong> {{ $user->about ?? 'Geen extra info' }}</p>
    </section>
  </main>

  <footer style="background:#8B0000; color:#fff; padding:1rem; text-align:center;">
    © 2025 Pizzeria Antonio
  </footer>
</body>
</html>
