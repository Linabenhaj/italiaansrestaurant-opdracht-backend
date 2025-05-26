<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profiel bewerken - {{ $user->username }} - Pizzeria Antonio</title>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>


<nav class="navigation" style="background-color: rgb(255, 207, 207); padding: 1rem; border-radius: 0;">
    <div class="nav-container" style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto;">
        <img src="{{ asset('images/pizzerialogo.png') }}" alt="Logo" style="height: 100px; border-radius: 0;">

        <ul class="nav-links" style="list-style: none; display: flex; gap: 1.5rem; margin: 0; padding: 0;">
            <li><a href="{{ url('/') }}" style="text-decoration: none; color: #8B0000; font-weight: 600;">Home</a></li>

            @auth
                <li><a href="{{ url('/profile/' . Auth::user()->username) }}" style="text-decoration: none; color: #8B0000;">Mijn Profiel</a></li>
                <li><a href="{{ url('/orders') }}" style="text-decoration: none; color: #8B0000;">Mijn Bestellingen</a></li>
                <li>
                    <a href="{{ route('logout') }}" style="text-decoration: none; color: #8B0000;"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" style="text-decoration: none; color: #8B0000;">Login</a></li>
                <li><a href="{{ route('register') }}" style="text-decoration: none; color: #8B0000;">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>

<body style="font-family: 'Outfit', sans-serif; background-color: #fff7d4; margin: 0; padding: 2rem;">

    <div style="max-width: 600px; margin: 2rem auto; background-color: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h1 style="color: #8B0000;">Profiel bewerken</h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update', $user->username) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Gebruikersnaam:</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}" required class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label">Geboortedatum:</label>
                <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label">Over mij:</label>
                <textarea name="bio" rows="4" class="form-control">{{ old('bio', $user->about) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Profielfoto:</label>
                <input type="file" name="avatar" class="form-control" />
            </div>

         <button type="submit" class="btn btn-primary" style="background-color: #8B0000; border: none;">
            Opslaan
        </button>
            <a href="{{ route('profile.show', $user->username) }}" class="btn btn-secondary" style="margin-left: 1rem;">Terug naar profiel</a>
        </form>
    </div>


</body>
</html>
