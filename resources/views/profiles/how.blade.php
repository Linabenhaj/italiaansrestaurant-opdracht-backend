@extends('admin.layout')
@section('title', 'Pizza Details – Admin Panel')

@section('content')
<main style="padding:2rem;">
  <h1 style="color:#8B0000;">Pizza: {{ $pizza->name }}</h1>

  <p><strong>Prijs:</strong> &euro;{{ number_format($pizza->price, 2, ',', '.') }}</p>
  @if($pizza->image_path)
    <img src="{{ asset('storage/'.$pizza->image_path) }}" alt="Pizza" style="width:300px; height:auto; margin-top:1rem;">
  @endif
</main>
@endsection
