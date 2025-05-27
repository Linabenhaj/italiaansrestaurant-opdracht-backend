@extends('admin.layout')
@section('title', 'Nieuwe FAQ – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; max-width:600px; margin:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Nieuwe vraag toevoegen</h1>

  <a href="{{ route('admin.faq.index') }}"
     style="display:inline-block; margin-bottom:1rem; color:#8B0000; text-decoration:none;">
    &larr; Terug naar FAQ
  </a>

  <form method="POST" action="{{ route('admin.faq.store') }}"
        style="background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    @csrf

    {{-- Categorie --}}
    <div style="margin-bottom:1rem;">
      <label for="faq_category_id">Categorie</label><br>
      <select name="faq_category_id" id="faq_category_id" required
              style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
        <option value="" disabled selected>Kies een categorie</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ old('faq_category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
      @error('faq_category_id') <div style="color:#c00;">{{ $message }}</div> @enderror
    </div>

    {{-- Vraag --}}
    <div style="margin-bottom:1rem;">
      <label for="question">Vraag</label><br>
      <input type="text" id="question" name="question" value="{{ old('question') }}" required
             style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
      @error('question') <div style="color:#c00;">{{ $message }}</div> @enderror
    </div>

    {{-- Antwoord (optioneel) --}}
    <div style="margin-bottom:1rem;">
      <label for="answer">Antwoord (optioneel)</label><br>
      <textarea id="answer" name="answer" rows="4"
                style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">{{ old('answer') }}</textarea>
      @error('answer') <div style="color:#c00;">{{ $message }}</div> @enderror
    </div>

    {{-- Submit --}}
    <button type="submit"
            style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
      Opslaan
    </button>
  </form>
</main>
@endsection
