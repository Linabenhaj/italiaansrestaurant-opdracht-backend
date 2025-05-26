<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Nieuws – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  @include('partials.navbar')

  <main style="padding:2rem; max-width:800px; margin:auto;">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1.5rem;">Alle nieuwsitems</h1>

    <ul style="list-style:none; padding:0; margin:0;">
      @foreach($newsItems as $item)
      <li style="display:flex; align-items:center; background:#fff; border-radius:6px; box-shadow:0 1px 4px rgba(0,0,0,0.1); margin-bottom:1rem; overflow:hidden;">
        <img 
          src="{{ asset('storage/'.$item->image_path) }}" 
          alt="{{ $item->title }}" 
          style="
            width:100px; 
            height:75px; 
            object-fit:cover; 
            flex-shrink:0;
          "
        >
        <div style="padding:0.75rem 1rem; flex:1;">
          <a 
            href="{{ route('news.show', $item) }}" 
            style="text-decoration:none; color:#8B0000; font-size:1rem; font-weight:600;"
          >
            {{ $item->title }}
          </a>
          <div style="font-size:0.8rem; color:#777; margin-top:0.25rem;">
            {{ \Carbon\Carbon::parse($item->published_at)->format('d-m-Y') }}
          </div>
        </div>
      </li>
      @endforeach
    </ul>

    <div style="margin-top:2rem; text-align:center;">
      {{ $newsItems->links() }}
    </div>
  </main>
</body>
</html>
