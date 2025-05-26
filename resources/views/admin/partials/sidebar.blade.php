<aside style="width:220px;
              background:#8B0000;
              color:#fff;
              padding:2rem 1rem;
              display:flex;
              flex-direction:column;
              justify-content:space-between;
              min-height:100vh;">
  <div>
    <h2 style="font-family:'Sigmar One',cursive;
               text-align:center;
               margin-bottom:2rem;">
      Admin Panel
    </h2>
    <nav style="display:flex;
                flex-direction:column;
                gap:1rem;">
      <a href="{{ route('admin.dashboard') }}"
         style="color:white;
                font-weight:{{ request()->routeIs('admin.dashboard') ? 'bold' : 'normal' }};">
        Dashboard
      </a>
      <a href="{{ route('admin.users.index') }}"
         style="color:white;
                font-weight:{{ request()->routeIs('admin.users.*') ? 'bold' : 'normal' }};">
        Gebruikers
      </a>
      <a href="{{ route('admin.faq.index') }}"
         style="color:white;
                font-weight:{{ request()->routeIs('admin.faq.*') ? 'bold' : 'normal' }};">
        FAQ
      </a>
      <a href="{{ route('admin.news.index') }}"
         style="color:white;
                font-weight:{{ request()->routeIs('admin.news.*') ? 'bold' : 'normal' }};">
        Nieuws
      </a>
      <a href="{{ route('admin.orders.index') }}"
         style="color:white;
                font-weight:{{ request()->routeIs('admin.orders.*') ? 'bold' : 'normal' }};">
        Bestellingen
      </a>
      <a href="{{ route('admin.contact.inbox') }}"
         style="color:white;
                font-weight:{{ request()->routeIs('admin.contact.*') ? 'bold' : 'normal' }};">
        Contacten
      </a>
    </nav>
  </div>

  {{-- Uitloggen --}}
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button style="width:100%;
                   background:#F6E27F;
                   color:#8B0000;
                   padding:0.5rem;
                   border:none;
                   border-radius:5px;
                   cursor:pointer;">
      Uitloggen
    </button>
  </form>
</aside>
