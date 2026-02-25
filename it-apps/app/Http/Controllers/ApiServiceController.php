<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiServiceController extends Controller
{
    /**
     * Display a listing of active services.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $services = Service::where('is_active', true)
            ->orderBy('display_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    /**
     * Display a single service by slug.
     *
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $slug): JsonResponse
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }
}
