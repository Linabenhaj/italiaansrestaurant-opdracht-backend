@extends('admin.layout')
@section('title', 'Pizza Toevoegen – Admin Panel')

@section('content')
<main style="padding:2rem;">
  <h1 style="color:#8B0000;">Nieuwe Pizza Toevoegen</h1>

  <form method="POST" action="{{ route('admin.pizzas.store') }}" enctype="multipart/form-data"
        style="background:#fff; padding:1.5rem; border-radius:8px; max-width:600px;">
    @csrf

    <label>Naam</label>
    <input type="text" name="name" value="{{ old('name') }}" required style="width:100%; padding:0.5rem; margin-bottom:1rem;">

    <label>Prijs (&euro;)</label>
    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required style="width:100%; padding:0.5rem; margin-bottom:1rem;">

    <label>Foto (optioneel)</label>
    <input type="file" name="image_path" style="margin-bottom:1rem;">

    <button type="submit" style="background:#8B0000; color:white; padding:0.5rem 1rem; border:none; border-radius:5px;">Toevoegen</button>
  </form>
</main>
@endsection
