{{-- resources/views/admin/faq-categories/index.blade.php --}}
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>FAQ‐Categorieën – Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body style="margin:0; font-family:'Outfit',sans-serif; display:flex; min-height:100vh; background:#FFF7D4;">
  {{-- Sidebar --}}
  @include('admin.partials.sidebar')

  <main style="flex:1; padding:2rem; overflow-y:auto;">
    <h1 style="color:#8B0000;">Categorieën Beheer</h1>
    <a
      href="{{ route('admin.faq-categories.create') }}"
      style="display:inline-block; background:#8B0000; color:#fff; padding:.75rem 1.5rem; border-radius:5px; text-decoration:none; margin:1rem 0;"
    >
      Nieuwe categorie
    </a>

    <table style="width:100%; border-collapse:collapse;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:.75rem; text-align:left;">Naam</th>
          <th style="padding:.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $cat)
          <tr style="border-bottom:1px solid #ccc;">
            <td style="padding:.75rem;">{{ $cat->name }}</td>
            <td style="padding:.75rem;">
              <a
                href="{{ route('admin.faq-categories.edit', $cat) }}"
                style="margin-right:1rem; color:#06c; text-decoration:none;"
              >
                Bewerken
              </a>
              <form
                method="POST"
                action="{{ route('admin.faq-categories.destroy', $cat) }}"
                style="display:inline;"
              >
                @csrf
                @method('DELETE')
                <button
                  type="submit"
                  style="background:none;border:none;color:#c00;cursor:pointer;"
                >
                  Verwijderen
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="2" style="padding:1rem; color:#555;">
              <em>Geen categorieën gevonden.</em>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </main>
</body>
</html>
