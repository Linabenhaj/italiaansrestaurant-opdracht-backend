{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title', 'Pizzeria Antonio')

@section('content')
  {{-- Welkom sectie --}}
  <section style="padding:2rem; text-align:center; background:#fff;">
    <h2 style="font-size:2rem; color:#8B0000;">Welkom bij Pizzeria Antonio</h2>
    <p style="font-size:1.1rem; color:#333;">
      Proef onze authentieke Italiaanse pizza’s, gemaakt met liefde en passie!
    </p>
  </section>

  {{-- Menu sectie --}}
  <section style="padding:2rem; background:#fffefe;">
    <h2 style="text-align:center; font-family:'Sigmar One',cursive; color:#8B0000;">Ons Menu</h2>
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:2rem; margin-top:2rem;">
      @forelse($pizzas as $pizza)
        <div style="
            background:#fff;
            border:1px solid #ccc;
            border-radius:10px;
            padding:1rem;
            text-align:center;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            height:400px;
          ">
          <div style="width:100%; height:180px; overflow:hidden; border-radius:8px;">
            @if($pizza->image_path)
              <img
                src="{{ asset('storage/'.$pizza->image_path) }}"
                alt="Pizza {{ $pizza->name }}"
                style="width:100%; height:100%; object-fit:cover;"
              >
            @else
              <div style="width:100%; height:100%; background:#eee; display:flex; align-items:center; justify-content:center; color:#aaa;">
                Geen afbeelding
              </div>
            @endif
          </div>
          <div>
            <h3 style="margin:1rem 0 .5rem; font-family:'Sigmar One',cursive; color:#8B0008;">
              {{ $pizza->name }}
            </h3>
            <p style="color:#444; margin-bottom:1rem;">
              &euro;{{ number_format($pizza->price,2,',','.') }}
            </p>
          </div>
          <div>
            @auth
              <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="pizza" value="{{ $pizza->id }}">
                <button type="submit"
                        style="background:#8B0008; color:#fff; padding:.5rem 1rem; border:none; border-radius:5px; cursor:pointer; width:100%;">
                  Bestellen
                </button>
              </form>
            @else
              <a href="{{ route('login') }}">
                <button type="button"
                        style="background:#8B0008; color:#fff; padding:.5rem 1rem; border:none; border-radius:5px; cursor:pointer; width:100%;">
                  Inloggen om te bestellen
                </button>
              </a>
            @endauth
          </div>
        </div>
      @empty
        <p style="text-align:center; color:#777;">Sorry, momenteel geen pizza’s beschikbaar.</p>
      @endforelse
    </div>
  </section>

  {{-- Laatste nieuws sectie --}}
  <section style="padding:2rem; background:#fffef6;">
    <h2 style="text-align:center; font-family:'Sigmar One',cursive; color:#8B0008;">
      Laatste nieuws
    </h2>
    <div style="display:grid; grid-template-columns:1fr; gap:1.5rem; margin-top:1rem;">
      @foreach($newsItems as $item)
        <article style="background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1); overflow:hidden;">
          <a href="{{ route('news.show', $item) }}" style="text-decoration:none; color:inherit;">
            <div style="width:100%; height:200px; overflow:hidden; background:#eee;">
              <img src="{{ asset('storage/'.$item->image_path) }}"
                   alt="{{ $item->title }}"
                   style="width:100%; height:100%; object-fit:cover;">
            </div>
            <div style="padding:1rem;">
              <h3 style="margin:0 0 .5rem; font-family:'Sigmar One',cursive; color:#8B0008; font-size:1.2rem;">
                {{ $item->title }}
              </h3>
              <p style="margin:0 0 .75rem; color:#444; font-size:.95rem; line-height:1.4;">
                {{ Str::limit($item->content,100) }}
              </p>
              <small style="color:#777; font-size:.85rem;">
                {{ $item->published_at->format('d-m-Y') }}
              </small>
            </div>
          </a>
        </article>
      @endforeach
    </div>
  </section>
@endsection
