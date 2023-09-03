<?php

namespace App\Services;

use App\Models\Post;

class HomeService
{
    public function index()
    {
        try {
            $posts = Post::with(['user', 'likes'])->withCount(['countComments', 'likes'])->latest('id')->paginate(10);
            foreach ($posts as $post) {
                $post->isLike = $post->likes->contains('user_id', auth()->id());
                $post->myPost = $post->user->id == auth()->id();
            }
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