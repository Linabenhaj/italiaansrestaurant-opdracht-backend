@extends('admin.layout')
@section('title', 'Gebruiker Bewerken – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Bewerk Gebruiker: {{ $user->name }}</h1>

  @if($errors->any())
    <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
      <ul style="margin:0; padding-left:1.25rem;">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data"
        style="max-width:600px; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    @csrf
    @method('PUT')

    <div style="margin-bottom:1rem;">
      <label for="name">Naam</label><br>
      <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="name" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="username">Gebruikersnaam</label><br>
      <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="username" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="email">E-mail</label><br>
      <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="email" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="birthday">Geboortedatum</label><br>
      <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}"
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="birthday" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="about">Over mij</label><br>
      <textarea id="about" name="about" rows="4"
                style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">{{ old('about', $user->about) }}</textarea>
      <x-error field="about" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="profile_picture">Nieuwe profielfoto</label><br>
      <input type="file" name="profile_picture" id="profile_picture"
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="profile_picture" />
    </div>

    <div style="margin-bottom:1rem;">
      <label>
        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
        Admin rechten
      </label>
    </div>

    <x-button type="submit" color="primary"
              style="background:#8B0000; color:#fff; padding:0.7rem 2rem; border:none; border-radius:5px; cursor:pointer;">
      Bijwerken
    </x-button>
    <a href="{{ route('admin.users.index') }}"
       style="margin-left:1rem; color:#8B0000; text-decoration:none;">Annuleren</a>
  </form>
</main>
@endsection
