<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::latest()->get();
        return view('news.index', compact('newsItems'));
    }

    public function show($id)
    {
        $item = NewsItem::findOrFail($id);
        return view('news.show', compact('item'));
    }
}
