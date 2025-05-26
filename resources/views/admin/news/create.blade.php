<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Nieuw nieuwsitem – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; height:100vh; background:#FFF7D4;">
 @include('admin.partials.sidebar')


  {{-- Main content --}}
  <main style="flex:1; padding:2rem; overflow-y:auto; max-width:600px; margin:auto;">
    <h1 style="color:#8B0000;">Nieuw nieuwsitem</h1>

    @if($errors->any())
      <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
        <ul style="margin:0;padding-left:1.25rem;">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
      @csrf

      <div style="margin-bottom:1rem;">
        <label>Titel</label><br>
        <input type="text" name="title" value="{{ old('title') }}" required style="width:100%; padding:0.5rem;">
      </div>

      <div style="margin-bottom:1rem;">
        <label>Afbeelding</label><br>
        <input type="file" name="image" required>
      </div>

      <div style="margin-bottom:1rem;">
        <label>Content</label><br>
        <textarea name="content" rows="6" required style="width:100%; padding:0.5rem;">{{ old('content') }}</textarea>
      </div>

      <div style="margin-bottom:1rem;">
        <label>Publicatiedatum</label><br>
        <input type="date" name="published_at" value="{{ old('published_at', now()->toDateString()) }}">
      </div>

      <button type="submit"
              style="background:#8B0000; color:#fff; padding:0.5rem 1rem; border:none; border-radius:5px; cursor:pointer;">
        Opslaan
      </button>

      <div style="margin-top:1rem;">
      <a href="{{ route('admin.news.index') }}" style="color:#8B0000; text-decoration:none;">&larr; Terug naar nieuwsbeheer</a>
    </div>
    </form>
  </main>
</body>
</html>
