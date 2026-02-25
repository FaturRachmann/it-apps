<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiArticleController extends Controller
{
    /**
     * Display a listing of published articles.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $articles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $articles
        ]);
    }

    /**
     * Display a single article by slug.
     *
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $slug): JsonResponse
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if (!$article) {
            return response()->json([
                'success' => false,
                'message' => 'Article not found'
            ], 404);
        }

        // Increment view count
        $article->increment('views_count');

        return response()->json([
            'success' => true,
            'data' => $article
        ]);
    }

    /**
     * Handle contact form submission via API.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function contact(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string|max:50',
        ]);

        $contactMessage = \App\Models\ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'phone' => $validated['phone'] ?? null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
            'data' => $contactMessage
        ]);
    }
}
