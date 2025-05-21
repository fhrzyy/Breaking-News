<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::where('status', 'approved')
                         ->where('section', 'latest')
                         ->latest()
                         ->take(3)
                         ->get();
        $popularNews = News::where('status', 'approved')
                          ->where('section', 'popular')
                          ->latest() // Atau orderBy('views', 'desc') jika sudah ada kolom views
                          ->take(3) // Batasi menjadi 3 item
                          ->get();
        $extracurricularNews = News::where('status', 'approved')
                                  ->where('section', 'extracurricular')
                                  ->latest()
                                  ->take(3)
                                  ->get();
        return view('home', compact('latestNews', 'popularNews', 'extracurricularNews'));
    }
}