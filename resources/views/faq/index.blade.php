<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>FAQ – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Outfit', sans-serif;
      background: #FFF7D4;
      margin: 0;
    }

    .faq-question {
      cursor: pointer;
      font-weight: 600;
      background-color: #fff7eb;
      padding: 1rem;
      border: 1px solid #eee;
      border-radius: 6px;
      margin-top: 1rem;
      transition: background 0.3s ease;
    }

    .faq-question:hover {
      background-color: #fff0cc;
    }

    .faq-answer {
      display: none;
      padding: 1rem;
      margin-top: -0.5rem;
      background: #fffef6;
      border-left: 4px solid #8B0000;
      border-radius: 0 0 6px 6px;
      color: #444;
    }

    .faq-answer.open {
      display: block;
    }

    form input, form select, form textarea {
      width: 100%;
      padding: .75rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-family: inherit;
    }

    form button {
      background: #8B0000;
      color: #fff;
      padding: .75rem 1.5rem;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
    }

    form button:hover {
      background: #a80000;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const questions = document.querySelectorAll('.faq-question');
      questions.forEach(q => {
        q.addEventListener('click', () => {
          const answer = q.nextElementSibling;
          answer.classList.toggle('open');
        });
      });
    });
  </script>
</head>
<body>

  @include('partials.header')
  @include('partials.navbar')

  <main style="max-width: 900px; margin: 2rem auto; padding: 0 1rem;">
    <h1 style="font-family:'Sigmar One', cursive; color:#8B0000; margin-bottom:1.5rem;">Veelgestelde Vragen</h1>

    {{-- FAQ per categorie --}}
    @foreach($faqCategories as $category)
      <section style="margin-bottom:2.5rem;">
        <h2 style="background:#8B0000; color:#fff; padding:.75rem 1rem; border-radius:4px; font-size:1.25rem;">
          {{ $category->name }}
        </h2>

        @if($category->faqs->isEmpty())
          <p style="padding:1rem; color:#555;"><em>Geen vragen in deze categorie.</em></p>
        @else
          @foreach($category->faqs as $faq)
            <div>
              <div class="faq-question">{{ $faq->question }}</div>
              <div class="faq-answer">{{ $faq->answer }}</div>
            </div>
          @endforeach
        @endif
      </section>
    @endforeach

    {{-- Vraag insturen formulier --}}
    <section style="margin-top:3rem; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
      <h2 style="font-family:'Sigmar One', cursive; color:#8B0000; margin-bottom:1rem;">Stel je vraag</h2>

      <form action="{{ route('faq.submit') }}" method="POST">
        @csrf

        <label for="faq_category_id"><strong>Categorie</strong></label>
        <select name="faq_category_id" id="faq_category_id" required>
          <option value="">— kies een categorie —</option>
          @foreach($faqCategories as $category)
            <option value="{{ $category->id }}" {{ old('faq_category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
        @error('faq_category_id')
          <div style="color:#c00; margin-bottom:1rem;">{{ $message }}</div>
        @enderror

        <label for="question"><strong>Je vraag</strong></label>
        <textarea name="question" id="question" rows="4" required>{{ old('question') }}</textarea>
        @error('question')
          <div style="color:#c00; margin-bottom:1rem;">{{ $message }}</div>
        @enderror

        <button type="submit">Verstuur vraag</button>
      </form>
    </section>
  </main>

</body>
</html>
