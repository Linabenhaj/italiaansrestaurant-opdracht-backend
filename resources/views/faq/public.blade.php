<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Veelgestelde vragen</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Veelgestelde vragen</h1>

        @foreach ($categories as $category)
            <h3>{{ $category->name }}</h3>
            <ul>
                @foreach ($category->faqs as $faq)
                    <li>
                        <strong>{{ $faq->question }}</strong><br>
                        {{ $faq->answer }}
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
</body>
</html>
