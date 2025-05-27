<p><strong>Naam:</strong> {{ \$name }}</p>
<p><strong>Email:</strong> {{ \$email }}</p>
<p><strong>Onderwerp:</strong> {{ \$subject }}</p>
<p><strong>Bericht:</strong><br>{{ \$messageBody }}</p>

--- admin/faq/create.blade.php ---
@extends('admin.layout')
@section('title', 'Nieuwe FAQ – Admin Panel')
@section('content')
<main style="flex:1; padding:2rem; max-width:600px; margin:auto;">
  <h1 style="color:#8B0000;">Nieuwe Vraag Toevoegen</h1>
  <form method="POST" action="{{ route('admin.faq.store') }}">
    @csrf
    <div>
      <label>Categorie</label>
      <select name="faq_category_id">
        @foreach(\$categories as \$category)
          <option value="{{ \$category->id }}">{{ \$category->name }}</option>
        @endforeach
      </select>
      <x-error field="faq_category_id" />
    </div>
    <div>
      <label>Vraag</label>
      <input type="text" name="question" value="{{ old('question') }}">
      <x-error field="question" />
    </div>
    <div>
      <label>Antwoord (optioneel)</label>
      <textarea name="answer">{{ old('answer') }}</textarea>
      <x-error field="answer" />
    </div>
    <x-button type="submit" color="primary">Opslaan</x-button>
  </form>
</main>
@endsection