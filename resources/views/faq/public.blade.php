<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Veelgestelde vragen – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-yellow-50 font-outfit">

  @include('partials.header')
  @include('partials.navbar')

  <main class="container mx-auto mt-10 p-8 bg-white rounded-lg shadow">
    <h1 class="font-sigmar text-3xl text-red-900 mb-6">Veelgestelde vragen</h1>

    @foreach ($categories as $category)
      <section class="mb-8">
        <h2 class="text-2xl font-semibold text-red-800 mb-4">{{ $category->name }}</h2>
        <ul class="list-disc ml-5 space-y-3">
          @foreach ($category->faqs as $faq)
            <li>
              <button class="font-semibold text-red-900 focus:outline-none">
                {{ $faq->question }}
              </button>
              <p class="mt-1 text-gray-700">
                {{ $faq->answer }}
              </p>
            </li>
          @endforeach
        </ul>
      </section>
    @endforeach
  </main>

  @include('partials.footer')

</body>
</html>
