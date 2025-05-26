<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Nieuw nieuwsitem – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0;font-family:'Outfit',sans-serif;display:flex;min-height:100vh;background:#FFF7D4;">
  @include('admin.partials.sidebar')

  <main style="flex:1;padding:2rem;overflow-y:auto;max-width:600px;margin:auto;">
    <h1 style="color:#8B0000;">Nieuw nieuwsitem</h1>
    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
      @csrf

      <label>Titel</label>
      <input type="text" name="title" required style="width:100%;padding:.5rem;">
      @error('title')<div class="error">{{ $message }}</div>@enderror

      <label>Afbeelding</label>
      <input type="file" name="image" required>
      @error('image')<div class="error">{{ $message }}</div>@enderror

      <label>Content</label>
      <textarea name="content" rows="6" required style="width:100%;padding:.5rem;"></textarea>
      @error('content')<div class="error">{{ $message }}</div>@enderror

      <label>Publicatiedatum</label>
      <input type="date" name="published_at" value="{{ now()->toDateString() }}">
      @error('published_at')<div class="error">{{ $message }}</div>@enderror

      <button type="submit" style="background:#8B0000;color:#fff;padding:.75rem 1.5rem;border:none;border-radius:5px;margin-top:1rem;">
        Opslaan
      </button>
    </form>
  </main>
</body>
</html>
