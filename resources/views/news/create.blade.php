<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nieuwsitem bewerken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-4">
        <h1>Nieuwsitem bewerken</h1>
        <form action="{{ route('news.update', $newsitem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Titel</label>
                <input type="text" name="title" value="{{ old('title', $newsitem->title) }}" required class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Afbeelding</label><br/>
                @if($newsitem->image)
                    <img src="{{ asset('storage/' . $newsitem->image) }}" width="150" alt="" class="mb-2" />
                @endif
                <input type="file" name="image" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Inhoud</label>
                <textarea name="content" required class="form-control" rows="5">{{ old('content', $newsitem->content) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Publicatiedatum</label>
                <input type="date" name="published_at" value="{{ old('published_at', $newsitem->published_at ? $newsitem->published_at->format('Y-m-d') : '') }}" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
</html>