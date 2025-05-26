{{-- resources/views/faq/index.blade.php --}}
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>FAQ – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <style>
    .faq-question { cursor: pointer; font-weight: 600; }
    .faq-answer { display: none; margin-top: .5rem; color: #444; }
    .faq-answer.open { display: block; }
    form input, form select, form textarea { width:100%; padding:.5rem; margin-bottom:1rem; border:1px solid #ccc; border-radius:4px; }
    form button { background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer; }
  </style>
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  @include('partials.header')
  @include('partials.navbar')

  <main style="max-width: 900px; margin:2rem auto; padding:0 1rem;">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1.5rem;">Veelgestelde Vragen</h1>

    {{-- FAQ per categorie --}}
    @foreach($faqCategories as $category)
      <section style="margin-bottom:2rem;">
        <h2 style="background:#8B0000; color:#fff; padding:.75rem 1rem; border-radius:4px; font-size:1.25rem;">
          {{ $category->name }}
        </h2>
        @if($category->faqs->isEmpty())
          <p style="padding:1rem; color:#555;"><em>Geen vragen in deze categorie.</em></p>
        @else
          @foreach($category->faqs as $faq)
            <div style="border-bottom:1px solid #eee; padding:1rem 0;">
              <div class="faq-question" onclick="this.nextElementSibling.classList.toggle('open')">
                {{ $faq->question }}
              </div>
              <div class="faq-answer">
                {{ $faq->answer }}
              </div>
            </div>
          @endforeach
        @endif
      </section>
    @endforeach

    {{-- Vraag insturen formulier --}}
    <section style="margin-top:3rem; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
      <h2 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1rem;">Stel je vraag</h2>
      <form action="{{ route('faq.submit') }}" method="POST">
        @csrf

        <label for="faq_category_id">Categorie</label>
        <select name="faq_category_id" id="faq_category_id" required>
          <option value="">— kies een categorie —</option>
          @foreach($faqCategories as $category)
            <option value="{{ $category->id }}" {{ old('faq_category_id') == $category->id ? 'selected':'' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
        @error('faq_category_id') <div style="color:#c00;">{{ $message }}</div> @enderror

        <label for="question">Je vraag</label>
        <textarea name="question" id="question" rows="4" required>{{ old('question') }}</textarea>
        @error('question') <div style="color:#c00;">{{ $message }}</div> @enderror

        <button type="submit">Verstuur vraag</button>
      </form>
    </section>
  </main>

</body>
</html>
