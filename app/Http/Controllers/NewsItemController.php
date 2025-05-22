<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::latest()->get();
        return view('news.index', compact('newsItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
        }




        NewsItem::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
            'published_at' => now(),
        ]);

        return redirect()->route('news.index')->with('success', 'News item added.');
    }
}
