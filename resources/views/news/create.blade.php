@extends('layouts.app')

@section('title', 'Nieuws toevoegen – Pizzeria Antonio')

@section('content')
  <div class="bg-white rounded-lg shadow p-8 max-w-xl mx-auto">
    <h1 class="font-sigmar text-2xl text-red-900 text-center mb-6">Nieuw nieuwsitem aanmaken</h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf

      <div>
        <label for="title" class="font-medium">Titel</label>
        <input id="title" name="title" type="text" value="{{ old('title') }}" required class="w-full p-2 border rounded">
        <x-error field="title" />
      </div>

      <div>
        <label for="image" class="font-medium">Afbeelding</label>
        <input id="image" name="image" type="file" accept="image/*" class="w-full">
        <x-error field="image" />
      </div>

      <div>
        <label for="content" class="font-medium">Inhoud</label>
        <textarea id="content" name="content" rows="6" required class="w-full p-2 border rounded">{{ old('content') }}</textarea>
        <x-error field="content" />
      </div>

      <div class="text-center">
        <x-button type="submit" color="primary">Opslaan</x-button>
        <x-button :href="route('news.index')" color="secondary">Annuleren</x-button>
      </div>
    </form>
  </div>
@endsection