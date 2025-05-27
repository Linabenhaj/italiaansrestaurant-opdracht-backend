<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsItem;

class AdminNewsController extends Controller
{
    public function index()
{
    $items = NewsItem::latest()->paginate(10);
    return view('admin.news.index', compact('items'));
}

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title'        => 'required|string',
        'body'         => 'required|string',
        'published_at' => 'required|date',
        'image'        => 'nullable|image',
    ]);

    // Als er een afbeelding is geüpload
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('news','public');
        $data['image_path'] = $path;
    }

    // Zet 'body' om naar 'content' opgeslagen
    $data['content'] = $data['body'];
    unset($data['body']);

    // Vul publicatiedatum
    $data['published_at'] = $data['published_at'] ?? now();

    NewsItem::create($data);

    return redirect()->route('admin.news.index')
                     ->with('success','Nieuwsitem toegevoegd.');
}

    public function edit(NewsItem $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, NewsItem $news)
{
    $data = $request->validate([
        'title'        => 'required|string',
        'body'         => 'required|string',
        'published_at' => 'required|date',
        'image'        => 'nullable|image',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('news','public');
        $data['image_path'] = $path;
    }

    $data['content'] = $data['body'];
    unset($data['body']);
    $data['published_at'] = $data['published_at'] ?? now();

    $news->update($data);

    return redirect()->route('admin.news.index')
                     ->with('success','Nieuwsitem bijgewerkt.');
}

//verwijderen newsitem
    public function destroy(NewsItem $news)
    {
        \Storage::disk('public')->delete($news->image_path);
        $news->delete();

        return redirect()->route('admin.news.index')
                         ->with('success','Nieuwsitem verwijderd.');
    }
}
