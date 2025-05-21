<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::where('status', 'approved')->where('section', 'latest')->latest()->take(6)->get();
        $popularNews = News::where('status', 'approved')->where('section', 'popular')->latest()->take(4)->get();
        $extracurricularNews = News::where('status', 'approved')->where('section', 'extracurricular')->latest()->take(4)->get();
        return view('home', compact('latestNews', 'popularNews', 'extracurricularNews'));
    }
}