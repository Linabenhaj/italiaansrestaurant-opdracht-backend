<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pizzeria Antonio</title>

    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
</head>
<body style="margin: 0; font-family: 'Outfit', sans-serif; background-color: #FFF7D4;">
    <header style="background-color: #8B0000; color: white; padding: 1rem; text-align: center;">
        <h1 style="margin: 0; font-family: 'Sigmar One', cursive;">Pizzeria Antonio</h1>
    </header>

    <main style="max-width: 400px; margin: 3rem auto; padding: 2rem; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #8B0000; font-family: 'Sigmar One', cursive;">Log in op je profiel</h2>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
                <ul style="margin: 0; padding-left: 1.2rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom: 1rem;">
                <label for="email" style="display: block; margin-bottom: 0.5rem; color: #8B0000;">E-mailadres</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="password" style="display: block; margin-bottom: 0.5rem; color: #8B0000;">Wachtwoord</label>
                <input id="password" type="password" name="password" required style="width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 1rem;">
                <label>
                    <input type="checkbox" name="remember"> Onthoud mij
                </label>
            </div>

            <div>
                <button type="submit" style="width: 100%; background-color: #8B0000; color: white; padding: 0.75rem; border: none; border-radius: 5px; cursor: pointer;">Inloggen</button>
            </div>
        </form>

        <p style="text-align: center; margin-top: 1rem;">
            Nog geen profiel?<br>
            <a href="{{ route('register') }}" style="color: #8B0000; font-weight: bold;">Maak je account hier aan</a>
        </p>
    </main>

    <footer class="pizzeria-footer" style="background-color: #1e1e1e; color: white; padding: 2rem 1rem;">
        <div class="footer-container" style="display: flex; flex-wrap: wrap; justify-content: space-around; max-width: 1200px; margin: 0 auto;">
            <div class="footer-column" style="flex: 1; min-width: 200px; margin: 1rem;">
                <h3 style="color: #F6E27F;">OVER ONS</h3>
                <p>Onze pizzeria staat voor authentieke Italiaanse pizza’s, vers bereid met de beste ingrediënten.<br>
                Gezellige sfeer en heerlijke smaken in het hart van België.</p>
            </div>
            <div class="footer-column" style="flex: 1; min-width: 200px; margin: 1rem;">
                <h3 style="color: #F6E27F;">CONTACT</h3>
                <p>Marktstraat 12<br>1000 Brussel</p>
                <p>+32 2 123 45 67</p>
                <p><a href="mailto:info@jouwpizzeria.be" style="color: #F6E27F; text-decoration: none;">info@jouwpizzeria.be</a></p>
            </div>
            <div class="footer-column" style="flex: 1; min-width: 200px; margin: 1rem;">
                <h3 style="color: #F6E27F;">OPENINGSTIJDEN</h3>
                <p>Maandag: Gesloten</p>
                <p>Di - Za: 11:00 - 22:30</p>
                <p>Zondag: 12:00 - 21:00</p>
            </div>
           
        </div>
        <div class="footer-bottom" style="margin-top: 2rem; text-align: center; font-size: 0.9rem;">
            <p>© 2025 Pizzeria Antonio | Alle rechten voorbehouden | Design door: Jouw Naam</p>
        </div>
    </footer>
</body>
</html>
