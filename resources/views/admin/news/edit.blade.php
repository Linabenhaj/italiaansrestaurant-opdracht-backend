{{-- resources/views/admin/news/edit.blade.php --}}
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Bewerk Nieuwsitem – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; height:100vh; background:#FFF7D4;">

  {{-- Sidebar --}}
  @include('admin.partials.sidebar')

  {{-- Main content --}}
  <main style="flex:1; padding:2rem; overflow-y:auto; max-width:600px; margin:auto;">
    <h1 style="color:#8B0000;">Bewerk Nieuwsitem</h1>

    @if($errors->any())
      <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
        <ul style="margin:0;padding-left:1.25rem;">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
    <div style="margin-top:1rem;">
      <a href="{{ route('admin.news.index') }}" style="color:#8B0000; text-decoration:none;">&larr; Terug naar nieuwsbeheer</a>
    </div>
      <div style="margin-bottom:1rem;">
        <label for="title" style="display:block; margin-bottom:.5rem;">Titel</label>
        <input
          id="title"
          name="title"
          type="text"
          value="{{ old('title', $news->title) }}"
          required
          style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;"
        >
      </div>

      {{-- HUIDIGE AFBEELDING --}}
      @if($news->image_path)
        <div style="margin-bottom:1rem;">
          <label style="display:block; margin-bottom:.5rem;">Huidige afbeelding</label>
          <img
            src="{{ asset('storage/'.$news->image_path) }}"
            alt="Huidige afbeelding van {{ $news->title }}"
            style="max-width:100%; border-radius:4px; box-shadow:0 2px 6px rgba(0,0,0,0.1);"
          >
        </div>
      @endif

      <div style="margin-bottom:1rem;">
        <label for="image" style="display:block; margin-bottom:.5rem;">Nieuwe afbeelding (optioneel)</label>
        <input id="image" name="image" type="file" style="width:100%; padding:.5rem;">
      </div>

      <div style="margin-bottom:1rem;">
        <label for="content" style="display:block; margin-bottom:.5rem;">Content</label>
        <textarea
          id="content"
          name="content"
          rows="6"
          required
          style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;"
        >{{ old('content', $news->content) }}</textarea>
      </div>

      <div style="margin-bottom:1rem;">
        <label for="published_at" style="display:block; margin-bottom:.5rem;">Publicatiedatum</label>
        <input
          id="published_at"
          name="published_at"
          type="date"
          value="{{ old('published_at', $news->published_at->toDateString()) }}"
          style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;"
        >
      </div>

      <button
        type="submit"
        style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;"
      >
        Bijwerken
      </button>
    </form>


  </main>
</body>
</html>
