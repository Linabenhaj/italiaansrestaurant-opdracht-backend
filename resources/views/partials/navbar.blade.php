<nav style="background:#8B0008; padding:1rem 0;">
  <div style="max-width:1200px; margin:0 auto; display:flex; align-items:center; gap:2rem; font-family:'Outfit',sans-serif;">

    @guest
      <a href="{{ route('home') }}"             style="color:#F6E27F; text-decoration:none;">Home</a>
      <a href="{{ route('news.index') }}"       style="color:#F6E27F; text-decoration:none;">Nieuws</a>
      <a href="{{ route('faq.public') }}"       style="color:#F6E27F; text-decoration:none;">FAQ</a>
      <a href="{{ route('contact.form') }}"     style="color:#F6E27F; text-decoration:none;">Contact</a>
<a href="{{ route('users.index') }}" style="color:#F6E27F; text-decoration:none;">
  Profielen
</a>


      <div style="margin-left:auto; display:flex; gap:2rem;">
        <a href="{{ route('login') }}"    style="color:#F6E27F; text-decoration:none;">Inloggen</a>
        <a href="{{ route('register') }}" style="color:#F6E27F; text-decoration:none;">Registreren</a>
      </div>
    @else
      <a href="{{ route('home') }}"             style="color:#F6E27F; text-decoration:none;">Home</a>
      <a href="{{ route('news.index') }}"       style="color:#F6E27F; text-decoration:none;">Nieuws</a>
      <a href="{{ route('faq.public') }}"       style="color:#F6E27F; text-decoration:none;">FAQ</a>
      <a href="{{ route('contact.form') }}"     style="color:#F6E27F; text-decoration:none;">Contact</a>
<a href="{{ route('users.index') }}" style="color:#F6E27F; text-decoration:none;">
  Profielen
</a>
      <a href="{{ route('orders.index') }}"     style="color:#F6E27F; text-decoration:none;">Mijn bestellingen</a>
      <a href="{{ route('user.dashboard') }}"   style="color:#F6E27F; text-decoration:none;">Dashboard</a>

      <form method="POST" action="{{ route('logout') }}" style="margin-left:auto;">
        @csrf
        <button type="submit"
                style="background:none; border:none; color:#F6E27F; cursor:pointer; font:inherit;">
          Uitloggen
        </button>
      </form>
    @endguest
  </div>
</nav>
