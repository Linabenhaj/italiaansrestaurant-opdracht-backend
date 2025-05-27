@extends('admin.layout')
@section('title', 'Nieuwe Gebruiker – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Nieuwe Gebruiker</h1>

  @if($errors->any())
    <div style="background:#ffe2e2; color:#c00; padding:1rem; border-radius:5px; margin-bottom:1rem;">
      <ul style="margin:0; padding-left:1.25rem;">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data"
        style="max-width:600px; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
    @csrf

    <div style="margin-bottom:1rem;">
      <label for="name">Naam</label><br>
      <input type="text" id="name" name="name" value="{{ old('name') }}" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="name" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="username">Gebruikersnaam</label><br>
      <input type="text" id="username" name="username" value="{{ old('username') }}" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="username" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="email">E-mail</label><br>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="email" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="password">Wachtwoord</label><br>
      <input type="password" id="password" name="password" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="password" />
    </div>

    <div style="margin-bottom:1rem;">
      <label for="password_confirmation">Herhaal wachtwoord</label><br>
      <input type="password" id="password_confirmation" name="password_confirmation" required
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
    </div>

    <div style="margin-bottom:1rem;">
      <label for="profile_picture">Profielfoto (optioneel)</label><br>
      <input type="file" name="profile_picture" id="profile_picture"
             style="width:100%; padding:0.5rem; border:1px solid #ccc; border-radius:5px;">
      <x-error field="profile_picture" />
    </div>

    <div style="margin-bottom:1rem;">
      <label>
        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}>
        Admin rechten
      </label>
    </div>

    <x-button type="submit" color="primary"
              style="background:#8B0000; color:#fff; padding:0.7rem 2rem; border:none; border-radius:5px; cursor:pointer;">
      Opslaan
    </x-button>

    <a href="{{ route('admin.users.index') }}"
       style="margin-left:1rem; color:#8B0000; text-decoration:none;">
      Annuleren
    </a>
  </form>
</main>
@endsection
