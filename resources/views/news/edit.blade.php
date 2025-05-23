<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<body>
    <div class="container mt-4">
        <h1>{{ $newsitem->title }}</h1>
        @if($newsitem->image)
            <img src="{{ asset('storage/' . $newsitem->image) }}" alt="{{ $newsitem->title }}" class="img-fluid mb-3" style="max-width:400px;">
        @endif
        <p>{!! nl2br(e($newsitem->content)) !!}</p>
        <p><small>Gepubliceerd op: {{ $newsitem->published_at ? $newsitem->published_at->format('d-m-Y') : 'Onbekend' }}</small></p>
    </div>
</body>
</html>