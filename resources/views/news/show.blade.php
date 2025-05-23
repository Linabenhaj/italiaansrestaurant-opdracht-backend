<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profiel van {{ $user->username }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-4" style="max-width: 800px;">
        <h1>{{ $user->username }}</h1>
        @if($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Profielfoto" class="rounded-circle mb-3" style="width: 150px;">
        @endif
        <p><strong>Geboortedatum:</strong> {{ $user->birthday ?? 'Niet opgegeven' }}</p>
        <p><strong>Over mij:</strong> {{ $user->bio ?? 'Geen info' }}</p>

        @auth
            @if(Auth::id() === $user->id)
                <a href="{{ route('profile.edit', $user->username) }}" class="btn btn-secondary">Profiel bewerken</a>
            @endif
        @endauth
    </div>
</body>
</html>
