@extends('layouts.app')

@section('content')
<h1>Contactformulier</h1>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('contact.submit') }}">
    @csrf

    <label for="name">Naam:</label><br>
    <input type="text" name="name" id="name" value="{{ old('name') }}"><br><br>
    @error('name')<div style="color:red">{{ $message }}</div>@enderror

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" value="{{ old('email') }}"><br><br>
    @error('email')<div style="color:red">{{ $message }}</div>@enderror

    <label for="message">Bericht:</label><br>
    <textarea name="message" id="message">{{ old('message') }}</textarea><br><br>
    @error('message')<div style="color:red">{{ $message }}</div>@enderror

    <button type="submit">Verstuur</button>
</form>
@endsection
