<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(SearchService $searchService)
    {
        try {
            $searchResponse = $searchService->index();
            return response()->json($searchResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function mostPopular(SearchService $searchService)
    {
        try {
            $searchResponse = $searchService->mostPopular();
            return response()->json($searchResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function mostLike(SearchService $searchService)
    {
        try {
            $searchResponse = $searchService->mostLike();
            return response()->json($searchResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function mostComment(SearchService $searchService)
    {
        try {
            $searchResponse = $searchService->mostComment();
            return response()->json($searchResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function search(SearchService $searchService, Request $request)
    {
        try {
            $searchResponse = $searchService->search($request);
            return response()->json($searchResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }
}
