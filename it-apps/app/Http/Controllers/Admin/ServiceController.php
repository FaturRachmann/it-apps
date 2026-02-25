<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index(): View
    {
        $services = Service::orderBy('display_order')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'description' => 'required|string',
            'price' => 'nullable|string|max:100',
            'icon_svg' => 'nullable|string',
            'is_active' => 'boolean',
            'display_order' => 'integer',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');
        $validated['display_order'] = $request->input('display_order', 0);

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'required|string',
            'price' => 'nullable|string|max:100',
            'icon_svg' => 'nullable|string',
            'is_active' => 'boolean',
            'display_order' => 'integer',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
