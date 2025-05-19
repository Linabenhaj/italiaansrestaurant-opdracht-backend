<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  @extends('layouts.app')

@section('title', 'Home - BrusselsExplorer')

@section('content')

<section class="banner">
  <img src="{{ asset('images/pizzabanner.jpg') }}" alt="Bannerafbeelding">
</section>

<section class="top-3-locaties">
  <h2>Ons Pizzamenu</h2>

  @foreach ([
    ['pizza_margherita.jpg', 'Margherita', '€8,50'],
    ['pizza_pepperoni.jpg', 'Pepperoni', '€10,00'],
    ['pizza_vegetariana.jpg', 'Vegetariana', '€9,50'],
    ['pizza_quattro_formaggi.jpg', 'Quattro Formaggi', '€11,00'],
    ['pizza_hawaiana.jpg', 'Hawaïana', '€9,00'],
    ['pizza_bbq_chicken.jpg', 'BBQ Chicken', '€11,50']
  ] as [$image, $name, $price])
    <div class="locatie">
      <img src="{{ asset('images/' . $image) }}" alt="Pizza {{ $name }}">
      <h3>{{ $name }}</h3>
      <p>{{ $price }}</p>
    </div>
  @endforeach
</section>

@endsection
</body>
</html>



