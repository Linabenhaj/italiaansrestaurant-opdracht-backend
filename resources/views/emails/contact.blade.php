{{-- resources/views/emails/contact.blade.php --}}

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Nieuw contactbericht</title>
</head>
<body>
  <h2>Nieuw bericht van {{ $data['name'] }}</h2>
  <p><strong>Email:</strong> {{ $data['email'] }}</p>
  <hr>
  <p>{!! nl2br(e($data['message'])) !!}</p>
</body>
</html>
