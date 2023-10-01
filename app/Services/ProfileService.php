<?php

namespace App\Services;

use App\Models\Follow;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileService
{
    public function myProfile()
    {
        try {
            $user = User::with([
                'posts:id,user_id,image',
                'followers:id'
            ])->withCount('posts', 'followers')->find(auth()->id());
            $posts = $user->posts->pluck('id');
            $totalLikes = Like::whereIn('post_id', $posts)->count();
            $followers = $user->followers->pluck('id');
            $thisUserFollowingUs = Follow::whereIn('user_id', $followers)->where('followed_user_id', $user->id)->pluck('user_id');
            $friends = User::whereIn('id', $thisUserFollowingUs)->get();
            return [
                'success' => true,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'profile_image' => $user->profile_image,
                    'about' => $user->about,
                    'city' => $user->city,
                    'total_likes' => $totalLikes,
                    'total_posts' => $user->posts_count,
                    'total_followers' => $user->followers_count,
                ],
                'friends' => $friends,
                'posts' => $user->posts,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service Error',
                'errors' => $e->getMessage(),
            ];
        }
    }

    public function show($id)
    {
        try {
            $user = User::with([
                'posts:id,user_id,image',
                'followers:id',
            ])->withCount('posts', 'followers')->find($id);
            if (!$user) {
                return [
                    'success' => false,
                    'message' => 'User not found',
                ];
            }
            $posts = $user->posts->pluck('id');
            $totalLikes = Like::whereIn('post_id', $posts)->count();
            $followers = $user->followers->pluck('id');
            $thisUserFollowingUs = Follow::whereIn('user_id', $followers)->where('followed_user_id', $user->id)->pluck('user_id');
            $friends = User::whereIn('id', $thisUserFollowingUs)->get();
            return [
                'success' => true,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'profile_image' => $user->profile_image,
                    'about' => $user->about,
                    'city' => $user->city,
                    'total_likes' => $totalLikes,
                    'total_posts' => $user->posts_count,
                    'total_followers' => $user->followers_count,
                ],
                'friends' => $friends,
                'posts' => $user->posts,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service Error',
                'errors' => $e,
            ];
        }
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::user();
            $validator = Validator::make($request->all(), [
                'name' => 'string',
                'email' => 'email|string',
                'profileImage' => 'image|mimes:jpeg,png,jpg,gif',
                'about' => 'max:150',
            ]);

            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }

            $validated = $validator->validated();

            $user->update($validated);

            return [
                'success' => true,
                'message' => 'Successfull update user profile',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service Error',
                'errors' => $e,
            ];
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            if ($user->id !== auth()->id()) {
                DB::rollBack();
                return [
                    'success' => false,
                    'message' => 'You\'re not the owner of this account',
                ];
            }
            $user->delete();
            DB::commit();
            return [
                'success' => true,
                'message' => 'Succcessfull delete account',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Service Error',
                'errors' => $e,
            ];
        }
    }
}
