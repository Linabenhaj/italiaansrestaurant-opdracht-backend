<header style="background:#8B0000; padding:1rem;">
  <nav style="max-width:1200px; margin:auto; display:flex; align-items:center; gap:1rem; font-family:'Outfit',sans-serif;">
    <a href="{{ route('home') }}"           style="color:#F6E27F; font-weight:600; text-decoration:none;">Home</a>
    <a href="{{ route('faq.public') }}"     style="color:white; text-decoration:none;">FAQ</a>
   <a href="{{ route('contact.form') }}" style="color:white; text-decoration:none;">Contact</a>
   <a href="{{ route('profiles.index') }}" style="color:white; text-decoration:none;">Profielen</a>

    @guest
      <div style="margin-left:auto; display:flex; gap:1rem;">
        <a href="{{ route('login') }}"    style="color:white; text-decoration:none;">Inloggen</a>
        <a href="{{ route('register') }}" style="color:white; text-decoration:none;">Registeren</a>
      </div>
    @else
      <div style="margin-left:auto; display:flex; align-items:center; gap:1rem;">
        <!-- Dashboard link -->
        <a href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('user.dashboard') }}"
           style="color:white; text-decoration:none;">
          Dashboard
        </a>
        <!-- Uitloggen form -->
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
          @csrf
          <button type="submit"
                  style="background:none; border:none; color:white; cursor:pointer; font:inherit;">
            Uitloggen
          </button>
        </form>
      </div>
    @endguest
  </nav>
</header>
