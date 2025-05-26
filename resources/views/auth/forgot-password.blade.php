<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wachtwoord vergeten</title>
</head>
<body>
  <h1>Wachtwoord vergeten</h1>

  @if (session('status'))
    <p style="color:green;">{{ session('status') }}</p>
  @endif

  @if ($errors->any())
    <ul style="color:red;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email">E-mailadres</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Verzend resetlink</button>
  </form>
</body>
</html>
