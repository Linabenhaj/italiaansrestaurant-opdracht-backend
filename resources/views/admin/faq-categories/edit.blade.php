@extends('admin.layout')
@section('title', 'Categorie Bewerken – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; max-width:600px; margin:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Categorie Bewerken</h1>

  <a href="{{ route('admin.faq.index') }}"
     style="display:inline-block; margin-bottom:1rem; color:#8B0000; text-decoration:none;">
    &larr; Terug naar FAQ
  </a>

  <form method="POST" action="{{ route('admin.faq-categories.update', $faqCategory) }}"
        style="background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    @csrf
    @method('PUT')

    <div style="margin-bottom:1rem;">
      <label for="name" style="display:block; margin-bottom:.5rem;">Naam categorie</label>
      <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $faqCategory->name) }}"
        required
        style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;"
      >
      @error('name')
        <div style="color:#c00;">{{ $message }}</div>
      @enderror
    </div>

    <x-button type="submit" color="primary"
              style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
      Bijwerken
    </x-button>
  </form>
</main>
@endsection
