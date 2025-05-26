<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>{{ $item->title }} – Nieuws</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  @include('partials.navbar')

  <main style="padding:2rem; max-width:800px; margin:2rem auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1rem;">
      {{ $item->title }}
    </h1>
    <small style="color:#555;">{{ \Carbon\Carbon::parse($item->published_at)->format('d-m-Y') }}</small>

    <div style="margin:1.5rem 0;">
      <img 
        src="{{ asset('storage/'.$item->image_path) }}" 
        alt="{{ $item->title }}" 
        style="width:100%; border-radius:8px; object-fit:cover; max-height:400px;"
      >
    </div>

    <div style="color:#444; line-height:1.6; font-size:1rem;">
      {!! nl2br(e($item->content)) !!}
    </div>

    <div style="margin-top:2rem; text-align:right;">
      <a 
        href="{{ route('news.index') }}" 
        style="text-decoration:none; color:#8B0000; font-weight:600;"
      >&larr; Terug naar nieuws</a>
    </div>
  </main>
</body>
</html>
