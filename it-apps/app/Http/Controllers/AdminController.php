<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Service;
use App\Models\Article;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @param Request $request
     * @return View
     */
    public function dashboard(Request $request): View
    {
        $stats = [
            'total_services' => Service::count(),
            'active_services' => Service::where('is_active', true)->count(),
            'total_articles' => Article::count(),
            'published_articles' => Article::where('is_published', true)->count(),
            'total_messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Show the services management page.
     *
     * @param Request $request
     * @return View
     */
    public function services(Request $request): View
    {
        $services = Service::orderBy('display_order')->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the articles management page.
     *
     * @param Request $request
     * @return View
     */
    public function articles(Request $request): View
    {
        $articles = Article::orderBy('published_at', 'desc')->get();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the contact messages page.
     *
     * @param Request $request
     * @return View
     */
    public function messages(Request $request): View
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Mark a message as read.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function markAsRead(Request $request, int $id): RedirectResponse
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Message marked as read.');
    }

    /**
     * Delete a contact message.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroyMessage(int $id): RedirectResponse
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
