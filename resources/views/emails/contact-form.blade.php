<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Nieuw contactbericht</title>
</head>
<body>
  <h1>Nieuw contactbericht ontvangen</h1>

  <p><strong>Naam:</strong> {{ $data->name }}</p>
  <p><strong>E-mail:</strong> {{ $data->email }}</p>
  <p><strong>Onderwerp:</strong> {{ $data->subject }}</p>
  <p><strong>Bericht:</strong></p>
  <p>{{ $data->message }}</p>
</body>
</html>
