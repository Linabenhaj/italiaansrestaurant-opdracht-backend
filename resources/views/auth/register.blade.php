<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Antonio</title>

    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
</head>
<body style="margin: 0; font-family: 'Outfit', sans-serif; background-color: #fff;">

<header style="background-color: #8B0000; color: white; padding: 1rem; text-align: center;">
    <h1 style="margin: 0; font-family: 'Sigmar One', cursive;">Pizzeria Antonio</h1>
</header>

<nav style="background-color: rgb(255, 207, 207); padding: 1rem;">
    <div style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto;">
        <img src="{{ asset('images/pizzerialogo.png') }}" alt="Logo" style="height: 100px;">
        <ul style="list-style: none; display: flex; gap: 1.5rem; margin: 0; padding: 0;">
            <li><a href="{{ url('/') }}" style="text-decoration: none; color: #8B0000;">Home</a></li>
            @auth
                <li><a href="{{ url('/profile/' . Auth::user()->username) }}" style="text-decoration: none; color: #8B0000;">Mijn Profiel</a></li>
                <li><a href="{{ url('/orders') }}" style="text-decoration: none; color: #8B0000;">Mijn Bestellingen</a></li>
                <li>
                    <a href="{{ route('logout') }}" style="text-decoration: none; color: #8B0000;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </li>
            @else
                <li><a href="{{ route('login') }}" style="text-decoration: none; color: #8B0000;">Login</a></li>
                <li><a href="{{ route('register') }}" style="text-decoration: none; color: #8B0000;">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>
@if ($errors->any())
  <div style="color:red;">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div style="max-width: 500px; margin: 3rem auto; padding: 2rem; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #8B0000;">Account Aanmaken</h2>
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 1rem;">
            <label for="name">Naam</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="username">Gebruikersnaam</label><br>
            <input type="text" name="username" id="username" value="{{ old('username') }}" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="email">E-mailadres</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="password">Wachtwoord</label><br>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="password_confirmation">Herhaal Wachtwoord</label><br>
            <input type="password" name="password_confirmation" id="password_confirmation" required style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="birthday">Verjaardag</label><br>
            <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="profile_picture">Profielfoto</label><br>
            <input type="file" name="profile_picture" id="profile_picture" style="width: 100%; padding: 0.5rem;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="about">Over Mij</label><br>
            <textarea name="about" id="about" rows="4" style="width: 100%; padding: 0.5rem;">{{ old('about') }}</textarea>
        </div>

        <button type="submit" style="background-color: #8B0000; color: white; border: none; padding: 0.7rem 2rem; border-radius: 5px; cursor: pointer;">Registreren</button>
    </form>
</div>

<footer style="background-color: #8B0000; color: white; padding: 2rem 1rem;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; max-width: 1200px; margin: 0 auto;">
        <div style="flex: 1; min-width: 200px; margin: 1rem;">
            <h3 style="color: #F6E27F;">OVER ONS</h3>
            <p>Onze pizzeria staat voor authentieke Italiaanse pizza’s, vers bereid met de beste ingrediënten.<br>Gezellige sfeer en heerlijke smaken in het hart van België.</p>
        </div>
        <div style="flex: 1; min-width: 200px; margin: 1rem;">
            <h3 style="color: #F6E27F;">CONTACT</h3>
            <p>Marktstraat 12<br>1000 Brussel</p>
            <p>+32 2 123 45 67</p>
            <p><a href="mailto:info@jouwpizzeria.be" style="color: #F6E27F; text-decoration: none;">info@jouwpizzeria.be</a></p>
        </div>
        <div style="flex: 1; min-width: 200px; margin: 1rem;">
            <h3 style="color: #F6E27F;">OPENINGSTIJDEN</h3>
            <p>Maandag: Gesloten</p>
            <p>Di - Za: 11:00 - 22:30</p>
            <p>Zondag: 12:00 - 21:00</p>
        </div>
    </div>
    <div style="margin-top: 2rem; text-align: center; font-size: 0.9rem;">
        <p>© 2025 Pizzeria Antonio | Alle rechten voorbehouden | Design door: Lina Benhaj</p>
    </div>
</footer>

</body>
</html>
