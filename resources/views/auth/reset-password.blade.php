<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wachtwoord opnieuw instellen</title>
</head>
<body>
  <h1>Nieuw wachtwoord instellen</h1>

  <form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ request()->route('token') }}">

    <label for="email">E-mailadres</label>
    <input type="email" name="email" value="{{ old('email') }}" required>

    <label for="password">Nieuw wachtwoord</label>
    <input type="password" name="password" required>

    <label for="password_confirmation">Bevestig wachtwoord</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Reset wachtwoord</button>
  </form>
</body>
</html>
