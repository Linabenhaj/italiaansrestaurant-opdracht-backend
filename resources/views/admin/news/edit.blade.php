@extends('admin.layout')
@section('title', 'Bewerk Nieuwsitem – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; max-width:600px; margin:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Bewerk Nieuwsitem</h1>

  @if($errors->any())
    <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
      <ul style="margin:0; padding-left:1.25rem;">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data"
        style="background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    @csrf
    @method('PUT')

    <div style="margin-bottom:1rem;">
      <a href="{{ route('admin.news.index') }}" style="color:#8B0000; text-decoration:none;">&larr; Terug naar nieuwsbeheer</a>
    </div>

    <div style="margin-bottom:1rem;">
      <label for="title">Titel</label><br>
      <input id="title" name="title" type="text" value="{{ old('title', $news->title) }}" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:4px;">
      <x-error field="title" />
    </div>

    @if($news->image_path)
      <div style="margin-bottom:1rem;">
        <label>Huidige afbeelding</label><br>
        <img src="{{ asset('storage/'.$news->image_path) }}"
             alt="Afbeelding {{ $news->title }}"
             style="max-width:100%; border-radius:4px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
      </div>
    @endif

    <div style="margin-bottom:1rem;">
      <label for="image">Nieuwe afbeelding (optioneel)</label><br>
      <input id="image" name="image" type="file"
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:4px;">
      <x-error field="image" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="body">Content</label><br>
      <textarea id="body" name="body" rows="6" required
                style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:4px;">{{ old('body', $news->body) }}</textarea>
      <x-error field="body" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="published_at">Publicatiedatum</label><br>
      <input id="published_at" name="published_at" type="date"
             value="{{ old('published_at', $news->published_at->toDateString()) }}"
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:4px;">
      <x-error field="published_at" />
    </div>

    <x-button type="submit" color="primary"
              style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
      Bijwerken
    </x-button>
  </form>
</main>
@endsection
