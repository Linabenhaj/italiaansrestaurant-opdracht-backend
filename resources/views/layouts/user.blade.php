<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>@yield('title') – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  {{-- Header --}}
  @include('partials.header')

  {{-- **ENKEL DEZE** rode navbar --}}
  @include('partials.navbar')

  {{-- WITTE NAV WEERWEGGEHAALD --}}

  <main style="padding:2rem; max-width:800px; margin:2rem auto;">
    @yield('content')
  </main>

  @include('partials.footer')

</body>
</html>
