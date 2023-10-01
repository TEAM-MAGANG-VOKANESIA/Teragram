<?php

namespace App\Services;

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
                'posts',
                'posts.likes',
                'followings.followings',
                'followings',
                'followers',
            ])->withCount('posts', 'followers')->find(auth()->id());
            $totalLikes = $user->posts->sum(function ($post) {
                return $post->likes->count();
            });
            $friends = $user->followings->filter(function ($followingUser) use ($user) {
                return $followingUser->followings->contains($user->id);
            })->map(function ($followingUser) {
                return [
                    'id' => $followingUser->id,
                    'name' => $followingUser->name,
                    'profile_image' => $followingUser->profile_image
                ];
            });
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
                'posts',
                'posts.likes',
                'followings.followings',
                'followings',
                'followers',
            ])->withCount('posts', 'followers')->find($id);
                $totalLikes = $user->posts->sum(function ($post) {
                    return $post->likes->count();
                });
                $friends = $user->followings->filter(function ($followingUser) use ($user) {
                    return $followingUser->followings->contains($user->id);
                })->map(function ($followingUser) {
                    return [
                        'id' => $followingUser->id,
                        'name' => $followingUser->name,
                        'image' => $followingUser->profile_image
                    ];
                });
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
