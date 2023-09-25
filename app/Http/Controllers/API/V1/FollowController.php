<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function followUser(string $userId)
    {
        DB::beginTransaction();
        try {
            $alreadyFollowing = Follow::where('user_id', auth()->id())->where('followed_user_id', $userId)->first();
            if ($alreadyFollowing) {
                return [
                    'success' => false,
                    'message' => 'You already following this user',
                ];
            }
            Follow::create([
                'user_id' => auth()->id(),
                'followed_user_id' => $userId,
            ]);
            DB::commit();
            return [
                'success' => true,
                'message' => 'Successfull follow user',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Service Error',
                'errors' => $e->getMessage(),
            ];
        }
    }

    public function unfollowUser(string $userId)
    {
        DB::beginTransaction();
        try {
            $isFollowing = Follow::where('user_id', auth()->id())->where('followed_user_id', $userId)->first();
            if ($isFollowing === null) {
                return [
                    'success' => false,
                    'message' => 'You\'re not following this user',
                ];
            }
            $isFollowing->delete();
            DB::commit();
            return [
                'success' => true,
                'message' => 'Successfull unfollow user',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Service Error',
                'errors' => $e->getMessage(),
            ];
        }
    }
}
