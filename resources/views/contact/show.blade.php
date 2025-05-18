@extends('layouts.app')

@section('content')
<h1>Contacteer ons</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('contact.submit') }}">
    @csrf
    <label for="name">Naam:</label><br>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label for="email">E-mail:</label><br>
    <input type="email" name="email" value="{{ old('email') }}"><br><br>

    <label for="message">Bericht:</label><br>
    <textarea name="message">{{ old('message') }}</textarea><br><br>

    <button type="submit">Versturen</button>
</form>
@endsection
