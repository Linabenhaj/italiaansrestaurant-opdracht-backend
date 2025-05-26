<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Contacteer ons</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Contactformulier</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf

        <div class="mb-3">
            <label for="name">Naam</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email">E-mailadres</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="message">Bericht</label>
            <textarea class="form-control" name="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Verstuur</button>
    </form>
</div>
</body>
</html>
