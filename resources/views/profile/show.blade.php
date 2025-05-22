@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->username ?? $user->name }}</h1>
    @if ($user->profile_photo)
        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profielfoto" width="150">
    @endif
    <p>Verjaardag: {{ $user->birthday ? $user->birthday->format('d-m-Y') : 'Niet opgegeven' }}</p>
    <p>Over mij: {{ $user->about_me ?? 'Geen info' }}</p>
</div>
@endsection
