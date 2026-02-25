<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index(): View
    {
        return view('contact.index');
    }

    /**
     * Handle contact form submission.
     */
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact.index')
            ->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
