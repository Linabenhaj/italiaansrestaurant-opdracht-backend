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

    <nav style="display:flex; flex-direction:column; gap:1rem;">
      <x-link 
        href="{{ route('admin.dashboard') }}" 
        style="color:white; font-weight:{{ request()->routeIs('admin.dashboard') ? 'bold' : 'normal' }};">
        Dashboard
      </x-link>

      <x-link 
        href="{{ route('admin.users.index') }}" 
        style="color:white; font-weight:{{ request()->routeIs('admin.users.*') ? 'bold' : 'normal' }};">
        Gebruikers
      </x-link>

      <x-link 
        href="{{ route('admin.orders.index') }}" 
        style="color:white; font-weight:{{ request()->routeIs('admin.orders.*') ? 'bold' : 'normal' }};">
        Bestellingen
      </x-link>

      <x-link 
        href="{{ route('admin.news.index') }}" 
        style="color:white; font-weight:{{ request()->routeIs('admin.news.*') ? 'bold' : 'normal' }};">
        Nieuws
      </x-link>
        <x-link 
        href="{{ route('admin.pizzas.index') }}" 
        style="color:white; font-weight:{{ request()->routeIs('admin.pizzas.*') ? 'bold' : 'normal' }};">
        Menu
        </x-link>

      <x-link 
        href="{{ route('admin.faq.index') }}" 
        style="color:white; font-weight:{{ request()->routeIs('admin.faq.*') ? 'bold' : 'normal' }};">
        FAQ
      </x-link>

  <x-link 
  href="{{ route('admin.contact.index') }}" 
  style="color:white; font-weight:{{ request()->routeIs('admin.contact.*') ? 'bold' : 'normal' }};">
  Contact
</x-link>

    </nav>
  </div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-button color="danger" class="w-full mt-4"
      style="width:100%; background:#F6E27F; color:#8B0000; padding:0.5rem; border:none; border-radius:5px; font-weight:bold; cursor:pointer;">
      Uitloggen
    </x-button>
  </form>
</aside>
