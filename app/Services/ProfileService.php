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
            $user = User::select(
                'id',
                'name',
                'email',
                'profile_image',
                'about',
                'city'
            )->with([
                'posts' => function ($query) {
                    $query->select('id', 'user_id', 'image');
                },
                'posts.likes' => function ($query) {
                    $query->select('post_id');
                },
            ])
                ->withCount('posts', 'followers')
                ->find(auth()->id());
            foreach ($user->posts as $post) {
                $user->totalLikes += $post->likes->count();
            }
            return [
                'success' => true,
                'user' => $user,
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
            $user = User::select(
                'id',
                'name',
                'email',
                'profile_image',
                'about',
                'city'
            )->with([
                'posts' => function ($query) {
                    $query->select('id', 'user_id', 'image');
                },
                'posts.likes' => function ($query) {
                    $query->select('post_id');
                },
            ])
                ->withCount('posts', 'followers')
                ->find($id);
            foreach ($user->posts as $post) {
                $user->totalLikes += $post->likes->count();
            }
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
