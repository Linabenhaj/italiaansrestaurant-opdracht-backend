<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Contactberichten – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; height:100vh; background:#FFF7D4;">

@include('admin.partials.sidebar')


  <main style="flex:1; padding:2rem; overflow-y:auto;">
    <h1 style="color:#8B0000;">Contactberichten</h1>

    @if(session('success'))
      <div style="background:#e0ffe0; padding:1rem; border-radius:5px; margin-bottom:1rem;">
        {{ session('success') }}
      </div>
    @endif

    <table style="width:100%; border-collapse:collapse;">
      <thead style="background:#ffeaea;">
        <tr>
          <th style="padding:0.75rem; text-align:left;">Naam</th>
          <th style="padding:0.75rem; text-align:left;">E-mail</th>
          <th style="padding:0.75rem; text-align:left;">Bericht</th>
          <th style="padding:0.75rem; text-align:left;">Datum</th>
          <th style="padding:0.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        @forelse($messages as $msg)
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:0.75rem;">{{ $msg->name }}</td>
          <td style="padding:0.75rem;">{{ $msg->email }}</td>
          <td style="padding:0.75rem; max-width:300px; white-space:pre-wrap;">{{ $msg->message }}</td>
          <td style="padding:0.75rem;">{{ $msg->created_at->format('d-m-Y H:i') }}</td>
          <td style="padding:0.75rem;">
            <form action="{{ route('admin.contact.destroy', $msg) }}" method="POST" onsubmit="return confirm('Weet je het zeker?');">
              @csrf @method('DELETE')
              <button type="submit" style="background:none;border:none;color:#c00;cursor:pointer;">Verwijder</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" style="padding:1rem; text-align:center;">Geen contactberichten gevonden.</td>
        </tr>
        @endforelse
      </tbody>
    </table>

    <div style="margin-top:1rem; text-align:center;">
      {{ $messages->links() }}
    </div>
  </main>
</body>
</html>
