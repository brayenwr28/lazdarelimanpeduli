<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'published')->latest()->get();

        return view('berita', compact('news'));
    }

    public function show(string $slug)
    {
        $news = News::where('status', 'published')->where('slug', $slug)->firstOrFail();
        $latestNews = News::where('status', 'published')->where('id', '!=', $news->id)->latest()->take(3)->get();

        return view('berita-detail', compact('news', 'latestNews'));
    }
}
