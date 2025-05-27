1. Projectbeschrijving en functionaliteiten
Deze webapplicatie voor een Italiaans restaurant biedt bezoekers een compleet overzicht van het menu én laat hen pizza’s bestellen via een winkelwagentje en afrekenproces. Daarnaast kunnen geregistreerde gebruikers nieuwsberichten lezen, FAQ’s bekijken en eigen vragen indienen, en hun profiel (profielfoto, gebruikersnaam, verjaardag, bio) updaten. Beheerders krijgen via een beveiligd admin-dashboard inzage in bestellingen, nieuws, contactberichten en FAQ’s, én kunnen nieuwe gebruikers en rechten beheren.

2. Belangrijkste functionaliteiten

Publieke homepage: menu-overzicht, nieuwsfeed, FAQ-categorieën en recente gebruikers.

Gebruikersauthenticatie: registratie met e-mailverificatie, login en wachtwoordreset.

Profielbeheer: profielfoto uploaden, naam/wachtwoord/wachtwoordreset, verjaardag en bio aanpassen.

Menu & bestelsysteem: pizza’s met afbeelding en prijs, winkelwagen en bestelworkflow.

Nieuws: items met tags, publicatiedatum en paginering.

FAQ: bekijken per categorie en eigen vragen indienen.

Contactformulier: bezoekers kunnen berichten sturen, admins kunnen beantwoorden.

Admin-dashboard: beveiligd via Middleware, met CRUD-functionaliteit voor news, FAQ, contact en bestellingen.


3. Tests uitvoeren
Alle PHPUnit-tests staan in tests/Feature. Voer ze uit met:

bash
Copier
Modifier
php artisan test
5. Screenshots
De in de README gebruikte screenshots zijn afkomstig van internet (profilen, menu, admin-dashboard) en illustreren de belangrijkste schermen zonder exacte links openbaar te maken.

6. Gebruikte bronnen

Laravel Docs voor framework-functionaliteit.

Tailwind CSS Docs voor styling.

Vite Docs voor bundling.

ChatGPT AI-ondersteuning voor:

PHPUnit-tests in tests/Feature/ProfileTest.php (regels 1–20),

debuggen van bestel-logica in app/Http/Controllers/Admin/OrderController.php (regels 14–27),

optimaliseren van Eloquent-query’s in app/Models/NewsItem.php (regels 12–19),

validatieklassen in app/Http/Requests/ProfileUpdateRequest.php (regels 5–14),

database-seeders in database/seeders/PizzaSeeder.php (regels 10–50),

inrichting van app/Http/Middleware/AdminMiddleware.php (regels 1–20).

docs/ai_chatlog.md bevat de volledige AI-interacties.

Onnodige bestanden en mappen
Verwijder gerust de volgende restanten die niet tot de kern van de applicatie behoren:

SQL-backups: backup-full.sql, sqlite-data.sql, sqlite-data-clean.sql.

Gecomprimeerde views: views.zip.

Lege of testartefacten: dev, user_type, er-ïs_admin = 1;, _admin = 1.

Dubbele Laravel-folder: website/ (tenzij je daar aparte code in onderhoudt).

