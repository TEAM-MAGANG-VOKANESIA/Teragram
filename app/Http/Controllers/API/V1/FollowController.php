<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\FollowService;

class FollowController extends Controller
{
    public function followUser(string $userId, FollowService $followService)
    {
        try {
            $followResponse = $followService->followUser($userId);
            return response()->json($followResponse);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'errors' => $e->getMessage(),
            ];
        }
    }

    public function unfollowUser(string $userId, FollowService $followService)
    {
        try {
            $followResponse = $followService->unfollowUser($userId);
            return response()->json($followResponse);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'errors' => $e->getMessage(),
            ];
        }
    }
}
