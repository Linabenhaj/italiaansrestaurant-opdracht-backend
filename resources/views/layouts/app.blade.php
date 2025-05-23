<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Pizzeria Antonio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-yellow-50 font-outfit min-h-screen flex flex-col">

    <header class="bg-red-900 text-white p-4 text-center font-sigmar">
        <h1 class="text-3xl">Pizzeria Antonio</h1>
    </header>

    <main class="flex-grow max-w-md mx-auto bg-white rounded-lg shadow-md mt-10 p-8">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-yellow-300 p-6 mt-10">
        <div class="max-w-5xl mx-auto flex flex-wrap justify-around text-sm">
            <div class="mb-4 min-w-[200px]">
                <h3 class="font-semibold mb-2">OVER ONS</h3>
                <p>Onze pizzeria staat voor authentieke Italiaanse pizza’s, vers bereid met de beste ingrediënten.<br />Gezellige sfeer en heerlijke smaken in het hart van België.</p>
            </div>
            <div class="mb-4 min-w-[200px]">
                <h3 class="font-semibold mb-2">CONTACT</h3>
                <p>Marktstraat 12<br />1000 Brussel</p>
                <p>+32 2 123 45 67</p>
                <p><a href="mailto:info@jouwpizzeria.be" class="text-yellow-400 hover:underline">info@jouwpizzeria.be</a></p>
            </div>
            <div class="mb-4 min-w-[200px]">
                <h3 class="font-semibold mb-2">OPENINGSTIJDEN</h3>
                <p>Maandag: Gesloten</p>
                <p>Di - Za: 11:00 - 22:30</p>
                <p>Zondag: 12:00 - 21:00</p>
            </div>
        </div>
        <div class="text-center text-xs mt-4">
            © 2025 Pizzeria Antonio | Alle rechten voorbehouden | Design door: Jouw Naam
        </div>
    </footer>
</body>
</html>
