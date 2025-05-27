



<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Nieuw contactbericht</title>
</head>
<body style="font-family:Arial,sans-serif; background:#fff8f0; padding:2rem;">
  <h2 style="color:#8B0000;">Nieuw bericht ontvangen via contactformulier</h2>

  <p><strong>Naam:</strong> {{ $message->name }}</p>
  <p><strong>Email:</strong> {{ $message->email }}</p>
  <p><strong>Onderwerp:</strong> {{ $message->subject }}</p>
  <p><strong>Bericht:</strong></p>
  <p style="white-space:pre-line;">{{ $message->message }}</p>
</body>
</html>
