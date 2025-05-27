@extends('layouts.app')

@section('title', $newsItem->title . ' – Nieuws – Pizzeria Antonio')

@section('content')
  <main style="padding:2rem; max-width:900px; margin:2rem auto;">
    <article style="background:#fff; padding:2rem; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <h1 style="font-family:'Sigmar One', cursive; color:#8B0008; font-size:2rem; margin-bottom:0.5rem;">
        {{ $newsItem->title }}
      </h1>
      <p style="color:#777; font-size:0.9rem; margin-bottom:1.5rem;">
        Gepubliceerd op {{ $newsItem->published_at->format('d-m-Y') }}
      </p>

      @if($newsItem->image_path)
        <div style="margin-bottom:1.5rem;">
          <img src="{{ asset('storage/'.$newsItem->image_path) }}"
               alt="{{ $newsItem->title }}"
               style="width:100%; max-height:400px; object-fit:cover; border-radius:8px;">
        </div>
      @endif

      <div style="color:#333; line-height:1.7; font-size:1.05rem;">
        {!! nl2br(e($newsItem->content)) !!}
      </div>

      <div style="margin-top:2rem; text-align:right;">
        <a href="{{ route('news.index') }}"
           style="color:#8B0008; font-weight:bold; text-decoration:none; border:1px solid #8B0008; padding:.5rem 1rem; border-radius:6px; background:#FFF7D4;">
          &larr; Terug naar nieuws
        </a>
      </div>
    </article>
  </main>
@endsection
