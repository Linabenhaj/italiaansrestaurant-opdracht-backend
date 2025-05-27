@extends('layouts.app')

@section('title', 'Profielen – Pizzeria Antonio')

@section('content')
<main style="padding:2rem; max-width:1000px; margin:auto;">
  <h1 style="font-family:'Sigmar One',cursive; color:#8B0008; margin-bottom:1.5rem;">
    Alle profielen
  </h1>

  <ul style="list-style:none; padding:0; display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1.5rem;">
    @forelse($users as $user)
      <li style="background:#fff; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.1); overflow:hidden;">
        <a href="{{ route('users.show', $user) }}" style="text-decoration:none; color:inherit; display:block;">
          <div style="height:140px; background:#eee; display:flex; align-items:center; justify-content:center;">
            @if($user->profile_picture)
              <img src="{{ asset('storage/'.$user->profile_picture) }}"
                   alt="{{ $user->name }}"
                   style="max-height:100%; object-fit:cover;">
            @else
              <span style="color:#777;">Geen foto</span>
            @endif
          </div>
          <div style="padding:1rem;">
            <h2 style="margin:0; font-size:1.1rem; color:#8B0008;">
              {{ $user->name }}
            </h2>
            <p style="margin:.5rem 0 0; font-size:.9rem; color:#555;">
              @<em>{{ $user->username }}</em>
            </p>
          </div>
        </a>
      </li>
    @empty
      <li style="color:#777; text-align:center;">Geen profielen gevonden.</li>
    @endforelse
  </ul>

  <div style="margin-top:2rem; text-align:center;">
    {{ $users->links() }}
  </div>
</main>
@endsection
