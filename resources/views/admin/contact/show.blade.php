<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Contact Bericht Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">
</head>


<body style="font-family: 'Outfit', sans-serif; margin: 2rem;">

@include('admin.partials.sidebar')
    <h1>Contact Bericht</h1>
    <p><strong>Naam:</strong> {{ $message->name }}</p>
    <p><strong>Email:</strong> {{ $message->email }}</p>
    <p><strong>Bericht:</strong></p>
    <p>{{ $message->message }}</p>

    <h2>Beantwoorden</h2>
    <form method="POST" action="{{ route('admin.contact.reply', $message->id) }}">
        @csrf
        <textarea name="reply" rows="5" style="width: 100%;" required></textarea>
        <button type="submit" style="margin-top: 1rem; padding: 0.5rem 1rem; background-color: #8B0000; color: white; border: none; cursor: pointer;">Verstuur Antwoord</button>
    </form>

    <a href="{{ route('admin.contact.inbox') }}" style="display: inline-block; margin-top: 1rem;">← Terug naar inbox</a>
</body>


</html>
