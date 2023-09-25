<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SearchService
{
    public function index()
    {
        try {
            $posts = Post::select('id', 'image')
                ->withCount(['countComments', 'likes'])
                ->paginate(50);
            return [
                'success' => true,
                'posts' => $posts,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function mostPopular()
    {
        try {
            $posts = Post::select('id', 'image')
                ->withCount(['countComments', 'likes'])
                ->orderByRaw('(count_comments_count + likes_count) DESC')
                ->paginate(50);
            return [
                'success' => true,
                'posts' => $posts,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function mostLike()
    {
        try {
            $posts = Post::select('id', 'image')
                ->withCount(['countComments', 'likes'])
                ->orderByRaw('likes_count DESC')
                ->paginate(50);
            return [
                'success' => true,
                'posts' => $posts,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function mostComment()
    {
        try {
            $posts = Post::select('id', 'image')
                ->withCount(['countComments', 'likes'])
                ->orderByRaw('count_comments_count DESC')
                ->paginate(50);
            return [
                'success' => true,
                'posts' => $posts,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function search($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'searchValue' => 'required',
            ]);
    
            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }
    
            $user = User::where('name', 'like', '%' . $request->searchValue . '%')->get(['id', 'name', 'email', 'profile_image']);
            $post = Post::where('caption', 'like', '%' . $request->searchValue . '%')->get(['id', 'image', 'caption']);
            return [
                'success' => true,
                'data' => [
                    'users' => $user,
                    'posts' => $post,
                ],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }
}