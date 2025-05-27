@extends('admin.layout')
@section('title', 'FAQ Beheer – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; font-family:'Outfit', sans-serif;">

  <h1 style="font-family:'Sigmar One',cursive; color:#8B0000; margin-bottom:1rem;">FAQ Beheer</h1>
  <p style="color:#555; margin-bottom:2rem;">
    Hier beheer je al je FAQ’s en categorieën.<br>
    Eerst de categorieën, daarna de nieuwe vragen, en ten slotte de beantwoorde vragen.
  </p>


  <section style="margin-bottom:3rem;">
    <h2 style="color:#8B0000; margin-bottom:1rem;">Categorieën</h2>
    <x-button href="{{ route('admin.faq-categories.create') }}" color="primary"
              style="display:inline-block; background:#8B0000; color:#fff; padding:.75rem 1.5rem; border-radius:5px; text-decoration:none; margin-bottom:1rem;">
      Nieuwe categorie
    </x-button>
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
            <a href="{{ route('admin.faq-categories.edit', $cat) }}"
               style="margin-right:1rem; color:#06c; text-decoration:none;">Bewerk</a>
            <form method="POST" action="{{ route('admin.faq-categories.destroy', $cat) }}" style="display:inline;">
              @csrf @method('DELETE')
              <x-button type="submit" color="danger"
                        style="background:none; border:none; color:#c00; cursor:pointer; padding:0;">
                Verwijderen
              </x-button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="2" style="padding:1rem; color:#555;"><em>Geen categorieën gevonden.</em></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </section>

  {{--- Opgestuurde vragen --}}
  <section style="margin-bottom:3rem;">
    <h2 style="color:#8B0000; margin-bottom:1rem;">Opgestuurde vragen (nog antwoord nodig)</h2>
    <x-button href="{{ route('admin.faq.create') }}" color="primary"
              style="display:inline-block; background:#8B0000; color:#fff; padding:.75rem 1.5rem; border-radius:5px; text-decoration:none; margin-bottom:1rem;">
      Nieuwe vraag
    </x-button>
    <table style="width:100%; border-collapse:collapse;">
      <thead style="background:#ffeaea;">
        <tr>
          <th style="padding:.75rem; text-align:left;">Categorie</th>
          <th style="padding:.75rem; text-align:left;">Vraag</th>
          <th style="padding:.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pendingFaqs as $faq)
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:.75rem;">{{ $faq->category->name }}</td>
          <td style="padding:.75rem;">{{ $faq->question }}</td>
          <td style="padding:.75rem;">
            <a href="{{ route('admin.faq.edit', $faq) }}"
               style="margin-right:1rem; color:#0a6; text-decoration:none;">Beantwoorden</a>
            <form method="POST" action="{{ route('admin.faq.destroy', $faq) }}" style="display:inline;">
              @csrf @method('DELETE')
              <x-button type="submit" color="danger"
                        style="background:none; border:none; color:#c00; cursor:pointer; padding:0;">
                Verwijderen
              </x-button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="3" style="padding:1rem; color:#555;"><em>Geen nieuwe vragen.</em></td></tr>
        @endforelse
      </tbody>
    </table>
  </section>

  {{Beantwoorde vragen --}}
  <section>
    <h2 style="color:#8B0000; margin-bottom:1rem;">Beantwoorde vragen</h2>
    <table style="width:100%; border-collapse:collapse;">
      <thead style="background:#fff4d6;">
        <tr>
          <th style="padding:.75rem; text-align:left;">Categorie</th>
          <th style="padding:.75rem; text-align:left;">Vraag</th>
          <th style="padding:.75rem; text-align:left;">Antwoord</th>
          <th style="padding:.75rem; text-align:left;">Acties</th>
        </tr>
      </thead>
      <tbody>
        @forelse($answeredFaqs as $faq)
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:.75rem;">{{ $faq->category->name }}</td>
          <td style="padding:.75rem;">{{ $faq->question }}</td>
          <td style="padding:.75rem; white-space:pre-wrap;">{{ $faq->answer }}</td>
          <td style="padding:.75rem;">
            <a href="{{ route('admin.faq.edit', $faq) }}"
               style="margin-right:1rem; color:#06c; text-decoration:none;">Bewerk</a>
            <form method="POST" action="{{ route('admin.faq.destroy', $faq) }}" style="display:inline;">
              @csrf @method('DELETE')
              <x-button type="submit" color="danger"
                        style="background:none; border:none; color:#c00; cursor:pointer; padding:0;">
                Verwijderen
              </x-button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="4" style="padding:1rem; color:#555;"><em>Nog geen beantwoorde vragen.</em></td></tr>
        @endforelse
      </tbody>
    </table>
  </section>

</main>
@endsection
