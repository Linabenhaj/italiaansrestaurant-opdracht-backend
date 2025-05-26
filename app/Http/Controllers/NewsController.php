<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // haal de nieuwsitems op gellimiteerd aan 10 per pgina
        $newsItems = NewsItem::latest()->paginate(10);

        // geef ze mee aan de pagina
        return view('news.index', compact('newsItems'));
    }

    public function show(NewsItem $newsItem)
    {
        // detailpagina
        return view('news.show', [
            'item' => $newsItem,
        ]);
    }
}
