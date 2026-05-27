<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
        $articles = \App\Models\Article::where('is_published', true)->orderBy('created_at', 'desc')->take(3)->get();
        $programs = \App\Models\Program::all();
        $galleries = \App\Models\Gallery::latest()->get();
        return view('home.index', compact('settings', 'articles', 'programs', 'galleries'));
    }

    public function berita()
    {
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
        $articles = \App\Models\Article::where('is_published', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('home.berita', compact('settings', 'articles'));
    }

    public function bacaBerita($slug)
    {
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
        $article = \App\Models\Article::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('home.baca', compact('settings', 'article'));
    }
}
