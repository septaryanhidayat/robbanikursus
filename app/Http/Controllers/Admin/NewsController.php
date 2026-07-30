<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $newsList = News::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'required|in:berita,galeri,pengumuman',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . rand(100, 999);
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = now();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
            $validated['image'] = 'storage/' . $imagePath;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita/Galeri berhasil dibuat.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'required|in:berita,galeri,pengumuman',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
            $validated['image'] = 'storage/' . $imagePath;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita/Galeri berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return back()->with('success', 'Berita/Galeri berhasil dihapus.');
    }
}
