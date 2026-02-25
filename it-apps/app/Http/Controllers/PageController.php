<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the home page.
     */
    public function home(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('display_order')
            ->limit(6)
            ->get();
            
        $articles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();
            
        return view('home.index', compact('services', 'articles'));
    }

    /**
     * Display the about page.
     */
    public function about(): View
    {
        return view('about.index');
    }

    /**
     * Display the services listing page.
     */
    public function services(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('display_order')
            ->get();
            
        return view('services.index', compact('services'));
    }

    /**
     * Display a single service.
     */
    public function serviceShow(string $slug): View
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('services.show', compact('service'));
    }

    /**
     * Display the articles listing page.
     */
    public function articles(): View
    {
        $articles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(9);
            
        return view('articles.index', compact('articles'));
    }

    /**
     * Display a single article.
     */
    public function articleShow(string $slug): View
    {
        $article = Article::where('slug', $slug)->where('is_published', true)->firstOrFail();

        // Increment view count
        $article->increment('views_count');

        // Get related articles (same category or latest)
        $relatedArticles = Article::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->limit(3)
            ->get();

        // If no related articles in same category, get latest articles
        if ($relatedArticles->count() === 0) {
            $relatedArticles = Article::where('is_published', true)
                ->where('id', '!=', $article->id)
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get();
        }

        return view('articles.show', compact('article', 'relatedArticles'));
    }

    /**
     * Display the contact page.
     */
    public function contact(): View
    {
        return view('contact.index');
    }

    /**
     * Display the FAQ page.
     */
    public function faq(): View
    {
        return view('faq.index');
    }

    /**
     * Display the privacy policy.
     */
    public function privacyPolicy(): View
    {
        return view('policies.privacy');
    }

    /**
     * Display the terms of service.
     */
    public function termsOfService(): View
    {
        return view('policies.terms');
    }

    /**
     * Display the cookie policy.
     */
    public function cookiePolicy(): View
    {
        return view('policies.privacy');
    }
}
