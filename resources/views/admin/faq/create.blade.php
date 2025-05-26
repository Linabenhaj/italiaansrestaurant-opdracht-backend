<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Nieuwe FAQ – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; height:100vh; background:#FFF7D4;">
  {{-- Sidebar --}}
  @include('admin.partials.sidebar')

  <main style="flex:1; padding:2rem; overflow-y:auto;">
    <h1 style="color:#8B0000;">Nieuwe vraag toevoegen</h1>
    <a href="{{ route('admin.faq.index') }}"
       style="display:inline-block; margin-bottom:1rem; color:#8B0000; text-decoration:none;">
      &larr; Terug naar FAQ
    </a>
    <form method="POST" action="{{ route('admin.faq.store') }}" style="max-width:600px; margin-top:1rem;">
      @csrf

      <div style="margin-bottom:1rem;">
        <label for="faq_category_id" style="display:block; margin-bottom:.5rem;">Categorie</label>
        <select name="faq_category_id" id="faq_category_id" required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        @error('faq_category_id') <div style="color:#c00;">{{ $message }}</div> @enderror
      </div>

      <div style="margin-bottom:1rem;">
        <label for="question" style="display:block; margin-bottom:.5rem;">Vraag</label>
        <input type="text" name="question" id="question" value="{{ old('question') }}" required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
        @error('question') <div style="color:#c00;">{{ $message }}</div> @enderror
      </div>

      <div style="margin-bottom:1rem;">
        <label for="answer" style="display:block; margin-bottom:.5rem;">Antwoord (optioneel)</label>
        <textarea name="answer" id="answer" rows="4" style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">{{ old('answer') }}</textarea>
        @error('answer') <div style="color:#c00;">{{ $message }}</div> @enderror
      </div>

      <button type="submit" style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
        Opslaan
      </button>

    </form>
  </main>
</body>
</html>
