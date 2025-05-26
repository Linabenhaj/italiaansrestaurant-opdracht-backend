<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Nieuwe Categorie – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; height:100vh; background:#FFF7D4;">
  @include('admin.partials.sidebar')

  <main style="flex:1; padding:2rem; overflow-y:auto;">

    <h1 style="color:#8B0000;">Nieuwe Categorie</h1>

    <form method="POST" action="{{ route('admin.faq-categories.store') }}" style="max-width:600px; margin-top:1rem;">
      @csrf

      <div style="margin-bottom:1rem;">
        <label for="name" style="display:block; margin-bottom:.5rem;">Naam categorie</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"
               required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
        @error('name') <div style="color:#c00;">{{ $message }}</div> @enderror
      </div>

      <button type="submit"
              style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
        Opslaan
      </button>
    </form>

        <a href="{{ route('admin.faq.index') }}"
       style="display:inline-block; margin-bottom:1rem; color:#8B0000; text-decoration:none;">
      &larr; Terug naar FAQ
    </a>
  </main>
</body>
</html>
