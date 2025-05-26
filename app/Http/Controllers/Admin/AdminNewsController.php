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
            'title'        => 'required|string|max:255',
            'image'        => 'required|image|max:2048',
            'content'      => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $path = $request->file('image')->store('news','public');
        $data['image_path']  = $path;
        $data['published_at']= $data['published_at'] ?? now();

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
            'title'        => 'required|string|max:255',
            'image'        => 'nullable|image|max:2048',
            'content'      => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            \Storage::disk('public')->delete($news->image_path);
            $data['image_path'] = $request->file('image')->store('news','public');
        }

        $data['published_at']= $data['published_at'] ?? $news->published_at;

        $news->update($data);

        return redirect()->route('admin.news.index')
                         ->with('success','Nieuwsitem bijgewerkt.');
    }

    public function destroy(NewsItem $news)
    {
        \Storage::disk('public')->delete($news->image_path);
        $news->delete();

        return redirect()->route('admin.news.index')
                         ->with('success','Nieuwsitem verwijderd.');
    }
}
