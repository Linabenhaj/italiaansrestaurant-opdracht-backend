@extends('layouts.app')

@section('title', 'Nieuws bewerken – Pizzeria Antonio')

@section('content')
  <div class="bg-white rounded-lg shadow p-8 max-w-xl mx-auto">
    <h1 class="font-sigmar text-2xl text-red-900 text-center mb-6">Nieuwsitem bewerken</h1>

    <form action="{{ route('news.update', $newsItem) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label for="title" class="font-medium">Titel</label>
        <input id="title" name="title" type="text" value="{{ old('title', $newsItem->title) }}" required class="w-full p-2 border rounded">
        <x-error field="title" />
      </div>

      <div>
        <label class="font-medium">Huidige afbeelding</label>
        @if($newsItem->image_path)
          <div class="my-2">
            <img src="{{ asset('storage/'.$newsItem->image_path) }}" class="w-full max-h-52 object-cover rounded">
          </div>
        @endif
        <label for="image" class="font-medium">Nieuwe afbeelding (optioneel)</label>
        <input id="image" name="image" type="file" accept="image/*" class="w-full">
        <x-error field="image" />
      </div>

      <div>
        <label for="content" class="font-medium">Inhoud</label>
        <textarea id="content" name="content" rows="6" required class="w-full p-2 border rounded">{{ old('content', $newsItem->content) }}</textarea>
        <x-error field="content" />
      </div>

      <div class="text-center">
        <x-button type="submit" color="primary">Bijwerken</x-button>
        <x-button :href="route('news.index')" color="secondary">Annuleren</x-button>
      </div>
    </form>
  </div>
@endsection