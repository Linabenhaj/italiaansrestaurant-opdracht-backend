<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard – Pizzeria Antonio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; min-height:100vh; background:#FFF7D4;">

  {{-- Sidebar --}}
  @include('admin.partials.sidebar')

  <main style="flex:1; padding:2rem; overflow-y:auto;">
    <h1 style="color:#8B0000;">Welkom, {{ $admin->name }}</h1>
    <p style="color:#555;">Ingelogd als: {{ $admin->email }}</p>

    <section style="margin-top:2rem; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1rem;">
      <div style="background:#ffeaea; padding:1rem; border-radius:10px;">
        <h3>Totaal gebruikers</h3>
        <p style="font-size:1.5rem; margin:0;">{{ $userCount }}</p>
      </div>
      <div style="background:#fff4d6; padding:1rem; border-radius:10px;">
        <h3>Openstaande FAQ’s</h3>
        <p style="font-size:1.5rem; margin:0;">{{ $pendingFaqs }}</p>
      </div>
      <div style="background:#eaffea; padding:1rem; border-radius:10px;">
        <h3>Contactberichten</h3>
        <p style="font-size:1.5rem; margin:0;">{{ $contactCount }}</p>
      </div>
    </section>
  </main>
</body>
</html>
