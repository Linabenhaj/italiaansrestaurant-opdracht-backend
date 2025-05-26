<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Gebruiker – Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>


<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; height:100vh; background:#FFF7D4;">
@include('admin.partials.sidebar')
  {{-- Main content --}}
  <main style="flex:1; padding:2rem; overflow-y:auto;">
    <h1 style="color:#8B0000;">Maak Nieuwe Gebruiker</h1>

    @if($errors->any())
      <div style="background:#ffe2e2;color:#c00;padding:1rem;border-radius:5px;margin-bottom:1rem;">
        <ul style="margin:0;">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.users.store') }}"
          method="POST"
          enctype="multipart/form-data"
          style="max-width:500px; background:#fff; padding:2rem; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
      @csrf

      <div style="margin-bottom:1rem;">
        <label for="name">Naam</label><br>
        <input type="text" id="name" name="name"
               value="{{ old('name') }}"
               required style="width:100%;padding:.5rem;">
      </div>

      <div style="margin-bottom:1rem;">
        <label for="username">Gebruikersnaam</label><br>
        <input type="text" id="username" name="username"
               value="{{ old('username') }}"
               required style="width:100%;padding:.5rem;">
      </div>

      <div style="margin-bottom:1rem;">
        <label for="email">E-mail</label><br>
        <input type="email" id="email" name="email"
               value="{{ old('email') }}"
               required style="width:100%;padding:.5rem;">
      </div>

      <div style="margin-bottom:1rem;">
        <label for="password">Wachtwoord</label><br>
        <input type="password" id="password" name="password"
               required style="width:100%;padding:.5rem;">
      </div>

      <div style="margin-bottom:1rem;">
        <label for="password_confirmation">Herhaal wachtwoord</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation"
               required style="width:100%;padding:.5rem;">
      </div>

      <div style="margin-bottom:1rem;">
        <label for="profile_picture">Profielfoto (optioneel)</label><br>
        <input type="file" name="profile_picture" id="profile_picture"
               style="width:100%;padding:.5rem;">
      </div>

      <div style="margin-bottom:1rem;">
        <label>
          <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked':'' }}>
          Maak admin?
        </label>
      </div>

      <button type="submit"
              style="background:#8B0000;color:#fff;padding:.7rem 2rem;border:none;border-radius:5px;cursor:pointer;">
        Opslaan
      </button>
      <a href="{{ route('admin.users.index') }}" style="margin-left:1rem;color:#8B0000;">
        Annuleren
      </a>
    </form>
  </main>

</body>
</html>
