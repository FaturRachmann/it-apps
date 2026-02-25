<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index(): View
    {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create(): View
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'gradient' => 'nullable|string|max:50',
            'gradient2' => 'nullable|string|max:50',
            'emoji' => 'nullable|string|max:10',
            'read_time' => 'nullable|integer',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['published_at'] ?? now();
        $validated['read_time'] = $validated['read_time'] ?? 5;

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug,' . $article->id,
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'gradient' => 'nullable|string|max:50',
            'gradient2' => 'nullable|string|max:50',
            'emoji' => 'nullable|string|max:10',
            'read_time' => 'nullable|integer',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
