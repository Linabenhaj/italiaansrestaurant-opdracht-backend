@extends('layouts.app')

@section('title', 'Nieuws – Pizzeria Antonio')

@section('content')
  <main style="max-width:900px; margin:2rem auto; padding:0 1rem;">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0008; text-align:center; margin-bottom:2rem;">
      Alle nieuwsitems
    </h1>

    <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:1.5rem;">
      @foreach($newsItems as $item)
        <li style="background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1); transition:transform 0.2s;">
          <a href="{{ route('news.show', $item) }}" style="display:flex; text-decoration:none; color:inherit;">
            <img src="{{ asset('storage/'.$item->image_path) }}"
                 alt="{{ $item->title }}"
                 style="width:120px; height:100px; object-fit:cover; flex-shrink:0;">

            <div style="padding:1rem; flex:1;">
              <h2 style="margin:0; font-size:1.1rem; color:#8B0008;">{{ $item->title }}</h2>
              <p style="margin-top:0.5rem; font-size:0.9rem; color:#666;">
                {{ $item->published_at->format('d-m-Y') }}
              </p>
            </div>
          </a>
        </li>
      @endforeach
    </ul>

    <div style="margin-top:2rem; text-align:center;">
      {{ $newsItems->links() }}
    </div>
  </main>
@endsection
