1. Projectbeschrijving en functionaliteiten
Deze webapplicatie voor een Italiaans restaurant biedt bezoekers een compleet overzicht van het menu én laat hen pizza’s bestellen en bekijken in mijn bestellingen na ingelogd te zijn. Daarnaast kunnen geregistreerde gebruikers nieuwsberichten lezen, FAQ’s bekijken en eigen vragen indienen, en hun profiel (profielfoto, gebruikersnaam, verjaardag, bio) updaten. Beheerders krijgen via een beveiligd admin-dashboard over bestellingen, nieuws, contactberichten en FAQ’s, én kunnen nieuwe gebruikers en rechten beheren.

2. Belangrijkste functionaliteiten

Publieke homepage: menu-overzicht, nieuwsfeed, FAQ-categorieën en recente gebruikers.

Gebruikersauthenticatie: registratie met e-mailverificatie, login en wachtwoordreset.

Profielbeheer: profielfoto uploaden, naam/wachtwoord/wachtwoordreset, verjaardag en bio aanpassen.

Menu & bestelsysteem: pizza’s met afbeelding en prijs, winkelwagen en bestelworkflow.

Nieuws: items met tags, publicatiedatum en paginering.

FAQ: bekijken per categorie en eigen vragen indienen.

Contactformulier: bezoekers kunnen berichten sturen, admins kunnen beantwoorden.

Admin-dashboard: beveiligd via Middleware, met CRUD-functionaliteit voor news, FAQ, contact en bestellingen.

Bestelsysteem: De gebruiker die ingelogd is kan pizza's bestellen.


3. Tests uitvoeren
Alle PHPUnit-tests staan in tests/Feature. 

https://www.swisstransfer.com/d/63e799cf-b308-4f49-8875-6e92d2e6828a

5. Screenshots

link naar de screenshots van mijn website : https://www.swisstransfer.com/d/b20417fd-9f13-4027-bcab-2988c9b67eaa = u moet het downloaden


6. Gebruikte bronnen

Laravel Docs voor framework-functionaliteit.

Tailwind CSS Docs voor styling.

Vite Docs voor bundling.

ChatGPT AI-ondersteuning voor:

PHPUnit-tests in tests/Feature/ProfileTest.php (regels 1–20),

debuggen van bestel-logica in app/Http/Controllers/Admin/OrderController.php (regels 14–27),

validatieklassen in app/Http/Requests/ProfileUpdateRequest.php (regels 5–14),

database-seeders in database/seeders/PizzaSeeder.php (regels 10–50),

inrichting van app/Http/Middleware/AdminMiddleware.php (regels 1–20).

Gebruikt om te debuggen in het algemeen

Foto's van internet voor de profielfoto's 

