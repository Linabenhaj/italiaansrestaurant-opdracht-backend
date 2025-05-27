@extends('admin.layout')
@section('title', 'Pizza Bewerken – Admin Panel')

@section('content')
<main style="padding:2rem;">
  <h1 style="color:#8B0000;">Pizza Bewerken: {{ $pizza->name }}</h1>

  <form method="POST" action="{{ route('admin.pizzas.update', $pizza) }}" enctype="multipart/form-data"
        style="background:#fff; padding:1.5rem; border-radius:8px; max-width:600px;">
    @csrf
    @method('PUT')

    <label>Naam</label>
    <input type="text" name="name" value="{{ old('name', $pizza->name) }}" required style="width:100%; padding:0.5rem; margin-bottom:1rem;">

    <label>Prijs (&euro;)</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $pizza->price) }}" required style="width:100%; padding:0.5rem; margin-bottom:1rem;">

    <label>Foto wijzigen (optioneel)</label>
    <input type="file" name="image_path" style="margin-bottom:1rem;">

    <button type="submit" style="background:#8B0000; color:white; padding:0.5rem 1rem; border:none; border-radius:5px;">Bijwerken</button>
  </form>
</main>
@endsection
