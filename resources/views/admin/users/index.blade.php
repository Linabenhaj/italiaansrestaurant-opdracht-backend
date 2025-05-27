@extends('admin.layout')
@section('title', 'Gebruikersbeheer – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; overflow-y:auto; background:#FFF7D4; min-height:100vh; font-family:'Outfit', sans-serif;">
  <h1 style="color:#8B0000; font-family:'Sigmar One', cursive;">Gebruikersbeheer</h1>
  <p style="color:#555;">Hieronder zie je alle gebruikers en kun je beheren:</p>

  <x-button href="{{ route('admin.users.create') }}" color="primary"
            style="display:inline-block; margin-bottom:1rem; background:#8B0000; color:#fff; padding:0.5rem 1rem; border-radius:5px; text-decoration:none;">
    Nieuwe gebruiker
  </x-button>

  <table style="width:100%; margin-top:1rem; border-collapse:collapse;">
    <thead style="background:#fff4d6;">
      <tr>
        <th style="padding:0.75rem;">ID</th>
        <th style="padding:0.75rem;">Foto</th>
        <th style="padding:0.75rem;">Naam</th>
        <th style="padding:0.75rem;">Gebruikersnaam</th>
        <th style="padding:0.75rem;">E-mail</th>
        <th style="padding:0.75rem; text-align:center;">Admin?</th>
        <th style="padding:0.75rem;">Acties</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:0.75rem;">{{ $user->id }}</td>
          <td style="padding:0.75rem;">
            @if($user->profile_picture)
              <img src="{{ asset('storage/'.$user->profile_picture) }}"
                   alt="Foto {{ $user->name }}"
                   style="width:50px; height:50px; object-fit:cover; border-radius:50%;">
            @else
              <div style="width:50px;height:50px;background:#ccc;border-radius:50%;"></div>
            @endif
          </td>
          <td style="padding:0.75rem;">{{ $user->name }}</td>
          <td style="padding:0.75rem;">{{ $user->username }}</td>
          <td style="padding:0.75rem;">{{ $user->email }}</td>
          <td style="padding:0.75rem; text-align:center;">
            @if($user->id === 1)
              Ja
            @else
              <form method="POST"
                    action="{{ $user->is_admin ? route('admin.users.demote', $user) : route('admin.users.promote', $user) }}"
                    style="display:inline;">
                @csrf
               <input type="checkbox" onchange="this.form.submit()" {{ $user->is_admin == 1 ? 'checked' : '' }}>
              </form>
            @endif
          </td>
          <td style="padding:0.75rem;">
            <a href="{{ route('admin.users.edit', $user) }}"
               style="margin-right:0.5rem; color:#06c; text-decoration:none;">Bewerk</a>
            @if($user->id !== 1)
              <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display:inline;">
                @csrf @method('DELETE')
                <x-button type="submit" color="danger"
                          style="background:none; border:none; color:#c00; cursor:pointer; padding:0;">
                  Verwijder
                </x-button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div style="margin-top:1rem; text-align:center;">
    {{ $users->links() }}
  </div>
</main>
@endsection