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

    <nav class="navigation" style="background-color: #F6E27F; padding: 1rem;">
        <div class="nav-container" style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto;">
            <img src="{{ asset('images/pizzerialogo.png') }}" alt="Logo" style="height: 60px;">
            <ul class="nav-links" style="list-style: none; display: flex; gap: 1.5rem; margin: 0; padding: 0;">
                <li><a href="{{ url('/') }}" style="text-decoration: none; color: #8B0000; font-weight: 600;">Home</a></li>
                    <li><a href="{{ route('login') }}" style="text-decoration: none; color: #8B0000;">Login</a></li>
                    <li><a href="{{ route('register') }}" style="text-decoration: none; color: #8B0000;">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <section style="padding: 2rem; text-align: center; background-color: #FFEFD5;">
        <h2 style="font-size: 2rem; color: #8B0000;">Welkom bij Pizzeria Antonio</h2>
        <p style="font-size: 1.1rem; color: #333;">Proef onze authentieke Italiaanse pizza’s, gemaakt met liefde en passie!</p>
    </section>

    {{-- Pizza Grid --}}
    <section style="padding: 2rem; background-color: #FFF7D4;">
        <h2 style="text-align: center; font-family: 'Sigmar One', cursive; color: #8B0000;">Ons Menu</h2>
        <div class="pizza-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-top: 2rem;">
            @foreach([
                ['pizza_margherita.jpg', 'Margherita', '€8,50'],
                ['pizza_pepperoni.jpg', 'Pepperoni', '€10,00'],
                ['pizza_vegetariana.jpg', 'Vegetariana', '€9,50'],
                ['pizza_quattro_formaggi.jpg', 'Quattro Formaggi', '€11,00'],
                ['pizza_hawaiana.jpg', 'Hawaïana', '€9,00'],
                ['pizza_bbq_chicken.jpg', 'BBQ Chicken', '€11,50'],
            ] as [$image, $name, $price])
                <div class="pizza-card" style="background-color: #fff; border: 1px solid #ccc; border-radius: 10px; padding: 1rem; text-align: center; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/' . $image) }}" alt="Pizza {{ $name }}" style="width: 100%; border-radius: 10px;">
                    <h3 style="margin-top: 1rem; font-family: 'Sigmar One', cursive; color: #8B0000;">{{ $name }}</h3>
                    <p style="color: #444;">{{ $price }}</p>
                    
                </div>
            @endforeach
        </div>
    </section>

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
