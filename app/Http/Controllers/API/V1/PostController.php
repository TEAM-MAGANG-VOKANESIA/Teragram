<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, PostService $postService)
    {
        try {
            $postResponse = $postService->store($request);
            return response()->json($postResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function deletePost(Request $request, PostService $postService)
    {
        try {
            $postResponse = $postService->deletePost($request);
            return response()->json($postResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function storeComment(Request $request, PostService $postService)
    {
        try {
            $postResponse = $postService->storeComment($request);
            return response()->json($postResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function showComment(Request $request, PostService $postService)
    {
        try {
            $postResponse = $postService->showComment($request);
            return response()->json($postResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function like(Request $request, PostService $postService)
    {
        try {
            $postResponse = $postService->like($request);
            return response()->json($postResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }
}
