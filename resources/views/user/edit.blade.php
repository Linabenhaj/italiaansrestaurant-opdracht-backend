<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Profiel Bewerken – Pizzeria Antonio</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; background:#FFF7D4;">

  @include('partials.header')
  @include('partials.navbar')

  <main style="padding:2rem; max-width:600px; margin:2rem auto; background:#fff; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
    <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; text-align:center; margin-bottom:1.5rem;">Profiel Bewerken</h1>

    @if($errors->any())
      <div style="background:#ffeaea; color:#c00; padding:1rem; border-radius:4px; margin-bottom:1.5rem;">
        <ul style="margin:0; padding-left:1.25rem;">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" style="display:grid; gap:1rem;">
      @csrf
      @method('PUT')

      <div>
        <label for="name">Naam</label><br>
        <input type="text" name="name" id="name" value="{{ old('name',$user->name) }}" required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
      </div>

      <div>
        <label for="username">Gebruikersnaam</label><br>
        <input type="text" name="username" id="username" value="{{ old('username',$user->username) }}" required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
      </div>

      <div>
        <label for="email">E-mail</label><br>
        <input type="email" name="email" id="email" value="{{ old('email',$user->email) }}" required style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
      </div>

      <div>
        <label for="birthday">Geboortedatum</label><br>
        <input type="date" name="birthday" id="birthday" value="{{ old('birthday',$user->birthday) }}" style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">
      </div>

      <div>
        <label for="about">Over mij</label><br>
        <textarea name="about" id="about" rows="4" style="width:100%; padding:.5rem; border:1px solid #ccc; border-radius:4px;">{{ old('about',$user->about) }}</textarea>
      </div>

      <div>
        <label for="profile_picture">Profielfoto</label><br>
        <input type="file" name="profile_picture" id="profile_picture" style="width:100%; padding:.5rem;">
      </div>

      <div style="display:flex; justify-content:space-between; align-items:center; margin-top:1.5rem;">
        <a href="{{ route('profile.show') }}" style="color:#8B0000; text-decoration:none;">← Terug naar profiel</a>
        <button type="submit" style="background:#8B0000; color:#fff; padding:.75rem 1.5rem; border:none; border-radius:5px; cursor:pointer;">
          Opslaan
        </button>
      </div>
    </form>
  </main>

</body>
</html>
