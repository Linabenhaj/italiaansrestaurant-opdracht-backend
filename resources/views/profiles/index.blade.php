<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Profielen – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  @include('partials.header')
  @include('partials.navbar')

  <main style="padding:2rem; max-width:900px; margin:auto;">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1.5rem;">Alle profielen</h1>

    <ul style="list-style:none; padding:0; display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:1.5rem;">
      @foreach($users as $user)
      <li style="background:#fff; border-radius:6px; box-shadow:0 1px 4px rgba(0,0,0,0.1); overflow:hidden;">
        <a href="{{ route('profiles.show', $user) }}" style="text-decoration:none; color:inherit;">
          <div style="padding:1rem; text-align:center;">
            @if($user->profile_picture)
              <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="{{ $user->name }}" style="width:80px; height:80px; object-fit:cover; border-radius:50%; margin-bottom:0.5rem;">
            @else
              <div style="width:80px; height:80px; background:#eee; border-radius:50%; display:inline-block; margin-bottom:0.5rem;"></div>
            @endif
            <h2 style="font-size:1rem; margin:0;">{{ $user->name }}</h2>
          </div>
        </a>
      </li>
      @endforeach
    </ul>

    <div style="margin-top:2rem; text-align:center;">
      {{ $users->links() }}
    </div>
  </main>

   {{-- Footer --}}
    <footer style="background:#8B0000; color:white; padding:2rem 1rem;">
        <div style="display:flex; flex-wrap:wrap; justify-content:space-around; max-width:1200px; margin:0 auto;">
            <div style="flex:1; min-width:200px; margin:1rem;">
                <h3 style="color:#F6E27F;">OVER ONS</h3>
                <p>Onze pizzeria staat voor authentieke Italiaanse pizza’s, vers bereid met de beste ingrediënten.<br>
                   Gezellige sfeer en heerlijke smaken in het hart van België.</p>
            </div>
            <div style="flex:1; min-width:200px; margin:1rem;">
                <h3 style="color:#F6E27F;">CONTACT</h3>
                <p>Marktstraat 12<br>1000 Brussel</p>
                <p>+32 2 123 45 67</p>
                <p>
                    <a href="mailto:info@jouwpizzeria.be" style="color:#F6E27F; text-decoration:none;">
                        info@jouwpizzeria.be
                    </a>
                </p>
            </div>
            <div style="flex:1; min-width:200px; margin:1rem;">
                <h3 style="color:#F6E27F;">OPENINGSTIJDEN</h3>
                <p>Maandag: Gesloten</p>
                <p>Di - Za: 11:00 - 22:30</p>
                <p>Zondag: 12:00 - 21:00</p>
            </div>
        </div>
        <div style="margin-top:2rem; text-align:center; font-size:0.9rem;">
            © 2025 Pizzeria Antonio | Alle rechten voorbehouden | Design door: Lina Benhaj
        </div>
    </footer>
</body>
</html>
