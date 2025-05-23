<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profiel bewerken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-4" style="max-width: 800px;">
        <h1>Profiel bewerken</h1>
        <form method="POST" action="{{ route('profile.update', $user->username) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Gebruikersnaam:</label>
                <input type="text" name="username" value="{{ old('username', $user->username) }}" required class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Geboortedatum:</label>
                <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="form-control" />
            </div>
            <div class="mb-3">
                <label class="form-label">Over mij:</label>
                <textarea name="bio" rows="4" class="form-control">{{ old('bio', $user->bio) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Profielfoto:</label>
                <input type="file" name="avatar" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
</html>
