@extends('admin.layout')
@section('title', 'Admin Dashboard – Pizzeria Antonio')

@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; display:flex; flex-direction:column; min-height:100vh; background:#FFF7D4;">
  <div style="margin-bottom:2rem;">
    <h1 style="font-family:'Sigmar One', cursive; font-size:2rem; color:#8B0000;">Welkom, {{ $admin->name ?? 'Admin' }}</h1>
    <p style="color:#555;">Ingelogd als: {{ $admin->email ?? 'admin@ehb.be' }}</p>
  </div>

  <section style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:2rem;">
    <!-- Totaal Gebruikers -->
    <div style="background:#FFE5EC; padding:2rem; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center;">
      <h3 style="font-size:1.4rem; font-weight:bold; margin-bottom:1rem;">Totaal gebruikers</h3>
      <p style="font-size:2.5rem; color:#8B0000; margin:0;">{{ $userCount }}</p>
    </div>

    <!-- Openstaande FAQ's -->
    <div style="background:#FFF4D6; padding:2rem; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center;">
      <h3 style="font-size:1.4rem; font-weight:bold; margin-bottom:1rem;">Openstaande FAQ’s</h3>
      <p style="font-size:2.5rem; color:#8B0000; margin:0;">{{ $pendingFaqs }}</p>
    </div>

    <!-- Contactberichten -->
    <div style="background:#E0FFE0; padding:2rem; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center;">
      <h3 style="font-size:1.4rem; font-weight:bold; margin-bottom:1rem;">Contactberichten</h3>
      <p style="font-size:2.5rem; color:#8B0000; margin:0;">{{ $contactCount }}</p>
    </div>

    <!-- Totaal Bestellingen -->
    <div style="background:#D6F0FF; padding:2rem; border-radius:12px; box-shadow:0 2px 6px rgba(0,0,0,0.1); text-align:center;">
      <h3 style="font-size:1.4rem; font-weight:bold; margin-bottom:1rem;">Totaal bestellingen</h3>
      <p style="font-size:2.5rem; color:#8B0000; margin:0;">{{ $orderCount }}</p>
    </div>
  </section>
</main>
@endsection
