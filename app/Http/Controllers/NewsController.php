<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::latest()->paginate(10);
        return view('news.index', compact('newsItems'));
    }

    public function show(NewsItem $newsItem)
    {
        return view('news.show', compact('newsItem'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'published_at' => 'required|date',
            
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('news_images', $filename, 'public');
        }

        NewsItem::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'published_at' => $data['published_at'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem aangemaakt.');
    }
}
