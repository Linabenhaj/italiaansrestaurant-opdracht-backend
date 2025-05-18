@extends('layouts.app')

@section('content')
<h1>Profiel bewerken</h1>

@if (session('status') === 'profile-updated')
    <div style="color: green;">Profiel succesvol bijgewerkt!</div>
@endif

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="username">Gebruikersnaam:</label><br>
    <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}"><br>
    @error('username')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <label for="birthday">Verjaardag:</label><br>
    <input type="date" name="birthday" id="birthday" value="{{ old('birthday', $user->birthday) }}"><br>
    @error('birthday')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <label for="about">Over mij:</label><br>
    <textarea name="about" id="about">{{ old('about', $user->about) }}</textarea><br>
    @error('about')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    @if ($user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" style="max-width: 150px; max-height: 150px; margin-bottom: 10px;">
    @endif

    <label for="profile_picture">Profielfoto:</label><br>
    <input type="file" name="profile_picture" id="profile_picture"><br>
    @error('profile_picture')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <br>

    <button type="submit">Opslaan</button>
</form>
@endsection
