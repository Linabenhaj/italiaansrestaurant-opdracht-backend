@extends('admin.layout')
@section('title', 'FAQ Bewerken – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Vraag bewerken</h1>

  <form method="POST" action="{{ route('admin.faq.update', $faq) }}" style="max-width:600px; margin-top:1rem; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    @csrf
    @method('PUT')

    <div style="margin-bottom:1rem;">
      <label for="faq_category_id" style="display:block; margin-bottom:.5rem;">Categorie</label>
      <select name="faq_category_id" id="faq_category_id" required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ $faq->faq_category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
      @error('faq_category_id') <div style="color:#c00;">{{ $message }}</div> @enderror
    </div>

    <div style="margin-bottom:1rem;">
      <label for="question" style="display:block; margin-bottom:.5rem;">Vraag</label>
      <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" required
             style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
      @error('question') <div style="color:#c00;">{{ $message }}</div> @enderror
    </div>

    <div style="margin-bottom:1rem;">
      <label for="answer" style="display:block; margin-bottom:.5rem;">Antwoord</label>
      <textarea name="answer" id="answer" rows="4"
                style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">{{ old('answer', $faq->answer) }}</textarea>
      @error('answer') <div style="color:#c00;">{{ $message }}</div> @enderror
    </div>

    <x-button type="submit" color="primary"
              style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
      Bijwerken
    </x-button>
  </form>
</main>
@endsection