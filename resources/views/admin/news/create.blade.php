@extends('admin.layout')
@section('title', 'Nieuw nieuwsitem – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; max-width:600px; margin:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Nieuw nieuwsitem</h1>

  @if($errors->any())
    <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
      <ul style="margin:0; padding-left:1.25rem;">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data"
        style="background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    @csrf

    <div style="margin-bottom:1rem;">
      <label for="title">Titel</label><br>
      <input type="text" id="title" name="title" value="{{ old('title') }}" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="title" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="image">Afbeelding</label><br>
      <input type="file" id="image" name="image" required
             style="padding:0.5rem;">
      <x-error field="image" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="body">Content</label><br>
      <textarea id="body" name="body" rows="6" required
                style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">{{ old('body') }}</textarea>
      <x-error field="body" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="published_at">Publicatiedatum</label><br>
      <input type="date" id="published_at" name="published_at" value="{{ old('published_at', now()->toDateString()) }}"
             style="padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="published_at" />
    </div>

    <x-button type="submit" color="primary"
              style="background:#8B0000; color:#fff; padding:0.5rem 1rem; border:none; border-radius:5px; cursor:pointer;">
      Opslaan
    </x-button>

    <div style="margin-top:1rem;">
      <a href="{{ route('admin.news.index') }}"
         style="color:#8B0000; text-decoration:none;">
        &larr; Terug naar nieuwsbeheer
      </a>
    </div>
  </form>
</main>
@endsection