<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $news = Auth::user()->role === 'admin' 
                ? News::latest()->get()
                : News::where('user_id', Auth::id())->latest()->get();
        } else {
            $news = News::where('status', 'approved')->latest()->get();
        }
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'section' => 'required|in:latest,popular,extracurricular',
        ]);

        $data['user_id'] = Auth::id();
        $data['status'] = Auth::user()->role === 'admin' ? 'approved' : 'pending';

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);
        return redirect()->route('news.index')->with('success', 'Berita berhasil dibuat');
    }

    public function edit(News $news)
    {
        if (Auth::user()->role !== 'admin' && $news->user_id !== Auth::id()) {
            abort(403);
        }
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        if (Auth::user()->role !== 'admin' && $news->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'section' => 'required|in:latest,popular,extracurricular',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if (Auth::user()->role === 'guru') {
            $data['status'] = 'pending';
        }

        $news->update($data);
        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {
        if (Auth::user()->role !== 'admin' && $news->user_id !== Auth::id()) {
            abort(403);
        }

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus');
    }

    public function approve(Request $request, News $news)
    {
        $this->middleware('role:admin');

        $data = $request->validate([
            'status' => 'required|in:approved,rejected',
            'notes' => 'nullable|string',
        ]);

        NewsApproval::create([
            'news_id' => $news->id,
            'admin_id' => Auth::id(),
            'status' => $data['status'],
            'notes' => $data['notes'],
        ]);

        $news->update(['status' => $data['status']]);
        return redirect()->route('news.index')->with('success', 'Status persetujuan berita diperbarui');
    }

    public function show($id)
{
    $news = News::where('status', 'approved')->findOrFail($id);
    return view('news.show', compact('news'));
}

public function publicIndex(Request $request)
{
    $section = $request->query('section', 'latest');
    $news = News::where('status', 'approved')
                ->where('section', $section)
                ->latest() // Gunakan latest() untuk semua section
                ->paginate(12);
    return view('news.publicIndex', compact('news', 'section'));
}

}