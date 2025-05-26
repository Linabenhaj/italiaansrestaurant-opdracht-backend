<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Mijn Profiel – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  @include('partials.header')
  @include('partials.navbar')

  <main style="padding:2rem; max-width:600px; margin:2rem auto; background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">Mijn Profiel</h1>

    @if(session('success'))
      <div style="background:#e0ffe0; color:#080; padding:1rem; border-radius:4px; margin-bottom:1.5rem;">
        {{ session('success') }}
      </div>
    @endif

    @if($user->profile_picture)
      <div style="text-align:center; margin-bottom:1.5rem;">
        <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="Profielfoto" style="width:150px; height:150px; object-fit:cover; border-radius:50%;">
      </div>
    @endif

    <p><strong>Naam:</strong> {{ $user->name }}</p>
    <p><strong>Gebruikersnaam:</strong> {{ $user->username }}</p>
    <p><strong>E-mail:</strong> {{ $user->email }}</p>
    <p><strong>Geboortedatum:</strong> {{ $user->birthday ?? 'Niet opgegeven' }}</p>
    <p><strong>Over mij:</strong><br>{{ $user->about ?? 'Geen extra informatie.' }}</p>

    <div style="text-align:center; margin-top:2rem;">
      <a href="{{ route('profile.edit') }}"
         style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border-radius:5px; text-decoration:none;">
        Profiel bewerken
      </a>
    </div>
  </main>

</body>
</html>
