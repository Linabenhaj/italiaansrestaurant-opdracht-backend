<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin – Pizzeria Antonio')</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4; display:flex; min-height:100vh;">
  @include('admin.partials.sidebar')
  @yield('content')
</body>
</html>