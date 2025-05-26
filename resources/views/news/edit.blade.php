<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Bewerk nieuwsitem – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0;font-family:'Outfit',sans-serif;display:flex;min-height:100vh;background:#FFF7D4;">
  @include('admin.partials.sidebar')

  <main style="flex:1;padding:2rem;overflow-y:auto;max-width:600px;margin:auto;">
    <h1 style="color:#8B0000;">Bewerk: {{ $news->title }}</h1>
    <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
      @csrf @method('PUT')

      <label>Titel</label>
      <input type="text" name="title" value="{{ old('title',$news->title) }}" required style="width:100%;padding:.5rem;">
      @error('title')<div class="error">{{ $message }}</div>@enderror

      <label>Huidige afbeelding</label><br>
      <img src="{{ asset('storage/'.$news->image_path) }}" style="max-width:200px;border-radius:4px;"><br>

      <label>Nieuwe afbeelding (optioneel)</label>
      <input type="file" name="image">
      @error('image')<div class="error">{{ $message }}</div>@enderror

      <label>Content</label>
      <textarea name="content" rows="6" required style="width:100%;padding:.5rem;">{{ old('content',$news->content) }}</textarea>
      @error('content')<div class="error">{{ $message }}</div>@enderror

      <label>Publicatiedatum</label>
      <input type="date" name="published_at" value="{{ old('published_at',$news->published_at->toDateString()) }}">
      @error('published_at')<div class="error">{{ $message }}</div>@enderror

      <button type="submit" style="background:#8B0000;color:#fff;padding:.75rem 1.5rem;border:none;border-radius:5px;margin-top:1rem;">
        Bijwerken
      </button>
    </form>
  </main>
</body>
</html>
