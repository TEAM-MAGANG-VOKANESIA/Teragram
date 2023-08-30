<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\StoryService;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index(StoryService $storyService)
    {
        try {
            $storyResponse = $storyService->index();
            return response()->json($storyResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function store(Request $request, StoryService $storyService)
    {
        try {
            $storyResponse = $storyService->store($request);
            return response()->json($storyResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function show(string $id, StoryService $storyService)
    {
        try {
            $storyResponse = $storyService->show($id);
            return response()->json($storyResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function destroy(Request $request, StoryService $storyService)
    {
        try {
            $storyResponse = $storyService->destroy($request);
            return response()->json($storyResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }
}
