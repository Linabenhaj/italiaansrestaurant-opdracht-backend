<!doctype html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="inhoud voorpagina">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'BrusselsExplorer')</title>
  <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
  <script src="https://unpkg.com/leaflet/dist/leaflet.js" defer></script>
</head>
<body>

  <header class="navigation">
    <div class="nav-container">
      <img src="{{ asset('images/pizzerialogo.png') }}" alt="Rustic Family Logo" class="logo">

      <div class="nav-title-box">
        <h1 class="nav-title">Pizzeria Antonio</h1>
      </div>

      <nav>
        <ul class="nav-links">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/menu') }}">Menu</a></li>
          <li><a href="{{ url('/about') }}">About us</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        </ul>
      </nav>
    </div>
  </header>

  @yield('content')

  <footer class="footer-pizzeria">
    <div class="footer-container">
      <div class="footer-blok">
        <h3>OVER ONS</h3>
        <p>
          Onze pizzeria staat voor authentieke Italiaanse pizza’s, vers bereid met de beste ingrediënten.<br>
          Gezellige sfeer en heerlijke smaken in het hart van België.
        </p>
      </div>
      <div class="footer-blok">
        <h3>CONTACT</h3>
        <p>Marktstraat 12<br>1000 Brussel</p>
        <p>+32 2 123 45 67</p>
        <p><a href="mailto:info@jouwpizzeria.be" class="footer-mail">info@jouwpizzeria.be</a></p>
      </div>
      <div class="footer-blok">
        <h3>OPENINGSTIJDEN</h3>
        <p>Maandag: Gesloten</p>
        <p>Di - Za: 11:00 - 22:30</p>
        <p>Zondag: 12:00 - 21:00</p>
      </div>
      <div class="footer-blok footer-socials">
        <a href="https://www.facebook.com" target="_blank" aria-label="Facebook" class="social-icon">f</a>
        <a href="https://www.instagram.com" target="_blank" aria-label="Instagram" class="social-icon">📸</a>
        <a href="mailto:info@jouwpizzeria.be" aria-label="Email" class="social-icon">✉️</a>
        <a href="https://goo.gl/maps/voorbeeld" target="_blank" aria-label="Google Maps" class="social-icon">📍</a>
      </div>
    </div>

    <div class="footer-copyright">
      <p>© 2025 Pizzeria Jouw Naam | Alle rechten voorbehouden | Design door: Jouw Naam</p>
    </div>
  </footer>

  <script src="{{ asset('js/map.js') }}"></script>
  <script src="{{ asset('js/index.js') }}"></script>
  <script src="{{ asset('js/login.js') }}"></script>

</body>
</html>
