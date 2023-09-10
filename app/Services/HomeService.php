<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeService
{
    public function index()
    {
        try {
            $userId = Auth::id();
            $posts = Post::with(['user', 'likes'])
                ->withCount(['countComments', 'likes'])
                ->latest('id')
                ->paginate(10);
            $posts->each(function ($post) use ($userId) {
                $post->isLiked = $post->likes->contains('user_id', $userId);
                $post->isMyPost = $post->user->id == $userId;
            });
            return [
                'posts' => $posts,
            ];
        } catch (\Exception $e) {
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }
}