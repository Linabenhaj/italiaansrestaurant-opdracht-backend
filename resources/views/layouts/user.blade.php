<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard Gebruiker')</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit', sans-serif; background:#fff;">
  <header style="background:#8B0000;color:#fff;padding:1rem;text-align:center;">
    <h1 style="font-family:'Sigmar One',cursive;">@yield('title', 'Dashboard Gebruiker')</h1>
  </header>

  <nav style="background:rgb(255,207,207);padding:1rem;">
    <div style="display:flex;gap:2rem;align-items:center;max-width:1200px;margin:0 auto;">
      <img src="{{ asset('images/pizzerialogo.png') }}" alt="Logo" style="height:80px;">
      <a href="{{ url('/') }}" style="color:#8B0000;font-weight:bold;">Home</a>
      <a href="{{ route('profile.edit') }}" style="color:#8B0000;">Profiel bewerken</a>
      <form method="POST" action="{{ route('logout') }}" style="margin-left:auto;">
        @csrf
        <button style="background:#8B0000;color:#fff;padding:.5rem 1rem;border:none;">Uitloggen</button>
      </form>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>
</body>
</html>
