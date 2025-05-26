{{-- resources/views/admin/faq-categories/edit.blade.php --}}
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Categorie Bewerken – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; min-height:100vh; background:#FFF7D4;">
  {{-- Sidebar --}}
  @include('admin.partials.sidebar')

  <main style="flex:1; padding:2rem; overflow-y:auto;">
    <h1 style="color:#8B0000;">Categorie Bewerken</h1>
    <a href="{{ route('admin.faq.index') }}"
       style="display:inline-block; margin-bottom:1rem; color:#8B0000; text-decoration:none;">
      &larr; Terug naar FAQ
    </a>
    <form method="POST" action="{{ route('admin.faq-categories.update', $faqCategory) }}" style="max-width:600px; margin-top:1rem;">
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

      <div style="display:flex; gap:1rem;">
        <button
          type="submit"
          style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;"
        >
          Bijwerken
        </button>
        
      </div>
    </form>
  </main>
</body>
</html>
