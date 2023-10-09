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
                'followings:id',
            ])->withCount('posts')->find(auth()->id());
            $posts = $user->posts->pluck('id');
            $totalLikes = Like::whereIn('post_id', $posts)->count();
            $followings = $user->followings->pluck('id');
            $thisUserFollowingUs = Follow::whereIn('user_id', $followings)->where('followed_user_id', $user->id)->pluck('user_id');
            $friends = User::whereIn('id', $thisUserFollowingUs)->get(['id', 'name', 'profile_image']);
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
                    'total_friends' => $friends->count(),
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
                'followings:id',
            ])->withCount('posts')->find($id);
            if (!$user) {
                return [
                    'success' => false,
                    'message' => 'User not found',
                ];
            }
            $posts = $user->posts->pluck('id');
            $totalLikes = Like::whereIn('post_id', $posts)->count();
            $followings = $user->followings->pluck('id');
            $thisUserFollowingUs = Follow::whereIn('user_id', $followings)->where('followed_user_id', $user->id)->pluck('user_id');
            $friends = User::whereIn('id', $thisUserFollowingUs)->get(['id', 'name', 'profile_image']);
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
                    'total_friends' => $friends->count(),
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

    public function updateIndex()
    {
        try {
            $user = Auth::user();

            return [
                'success' => true,
                'user' => $user,
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
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email|string',
                'profileImage' => 'image|mimes:jpeg,png,jpg,gif',
                'about' => 'max:150',
                'city' => 'max:50',
            ]);

            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }
            
            $user = Auth::user();

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'profile' => $request->profile,
                'about' => $request->about,
                'city' => $request->city,
            ]);
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->profile_image = $request->profileImage;
            // $user->about = $request->about;
            // $user->city = $request->city;

            return [
                'success' => true,
                'message' => 'Successfull update user profile',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service Error',
                'errors' => $e->getMessage(),
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
