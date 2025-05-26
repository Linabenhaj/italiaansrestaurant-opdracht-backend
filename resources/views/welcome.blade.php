<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Antonio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

    {{-- Header & Navbar --}}
    @include('partials.header')
    @include('partials.navbar')

    {{-- Welkom sectie --}}
    <section style="padding:2rem; text-align:center; background:#fff;">
        <h2 style="font-size:2rem; color:#8B0000;">Welkom bij Pizzeria Antonio</h2>
        <p style="font-size:1.1rem; color:#333;">
            Proef onze authentieke Italiaanse pizza’s, gemaakt met liefde en passie!
        </p>
    </section>

    {{-- Menu sectie --}}
    <section style="padding:2rem; background:#fffefe;">
        <h2 style="text-align:center; font-family:'Sigmar One',cursive; color:#8B0000;">Ons Menu</h2>
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:2rem; margin-top:2rem;">
            @foreach([
                ['pizza_margherita.jpg', 'Margherita', '€8,50'],
                ['pizza_pepperoni.jpg', 'Pepperoni', '€10,00'],
                ['pizza_vegetariana.jpg', 'Vegetariana', '€9,50'],
                ['pizza_quattro_formaggi.jpg', 'Quattro Formaggi', '€11,00'],
                ['pizza_hawaiana.jpg', 'Hawaïana', '€9,00'],
                ['pizza_bbq_chicken.jpg', 'BBQ Chicken', '€11,50'],
            ] as [$image, $name, $price])
                <div style="background:#fff; border:1px solid #ccc; border-radius:10px;
                            padding:1rem; text-align:center; box-shadow:0 0 10px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/' . $image) }}"
                         alt="Pizza {{ $name }}"
                         style="width:100%; border-radius:10px;">
                    <h3 style="margin-top:1rem; font-family:'Sigmar One',cursive; color:#8B0000;">
                        {{ $name }}
                    </h3>
                    <p style="color:#444;">{{ $price }}</p>
                    @auth
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="pizza" value="{{ $name }}">
                            <button type="submit"
                                    style="background:#8B0000; color:#fff; padding:.5rem 1rem;
                                           border:none; border-radius:5px; cursor:pointer;">
                                Bestellen
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">
                            <button type="button"
                                    style="background:#8B0000; color:#fff; padding:.5rem 1rem;
                                           border:none; border-radius:5px; cursor:pointer;">
                                Bestellen
                            </button>
                        </a>
                    @endauth
                </div>
            @endforeach
        </div>
    </section>

    {{-- Nieuws sectie --}}
    <section style="padding:2rem; background:#fffef6;">
        <h2 style="text-align:center; font-family:'Sigmar One',cursive; color:#8B0000;">
            Laatste nieuws
        </h2>
        <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
                    gap:1.5rem; margin-top:1rem;">
            @foreach($newsItems as $item)
                <article style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);
                                overflow:hidden;">
                    <a href="{{ route('news.show', $item) }}" style="text-decoration:none; color:inherit;">
                        <div style="width:100%; height:160px; overflow:hidden; background:#eee;">
                            <img src="{{ asset('storage/'.$item->image_path) }}"
                                 alt="{{ $item->title }}"
                                 style="width:100%; height:100%; object-fit:cover;">
                        </div>
                        <div style="padding:1rem;">
                            <h3 style="margin:0 0 .5rem; font-family:'Sigmar One',cursive;
                                       color:#8B0000; font-size:1.1rem;">
                                {{ $item->title }}
                            </h3>
                            <p style="margin:0 0 .75rem; color:#444; font-size:.9rem; line-height:1.4;">
                                {{ Str::limit($item->content, 80) }}
                            </p>
                            <small style="color:#777; font-size:.8rem;">
                                {{ $item->published_at->format('d-m-Y') }}
                            </small>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </section>

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
