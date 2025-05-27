@extends('admin.layout')
@section('title', 'FAQ Bekijken – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; max-width:600px; margin:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Vraag Details</h1>

  <div style="margin-top:1rem; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    <p style="margin-bottom:1rem;"><strong>Categorie:</strong> {{ $faq->category->name }}</p>
    <p style="margin-bottom:1rem;"><strong>Vraag:</strong><br> {{ $faq->question }}</p>
    <p style="margin-bottom:1rem;"><strong>Antwoord:</strong><br>
      {{ $faq->answer ? $faq->answer : 'Nog niet beantwoord' }}
    </p>

    <a href="{{ route('admin.faq.index') }}"
       style="display:inline-block; color:#8B0000; text-decoration:none; margin-top:1rem;">
      &larr; Terug naar overzicht
    </a>
  </div>
</main>
@endsection
