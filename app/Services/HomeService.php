<?php

namespace App\Services;

use App\Models\Post;

class HomeService
{
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->withCount(['countComments', 'likes'])->latest('id')->paginate(10);
        foreach ($posts as $post) {
            $post->isLike = $post->likes->contains('user_id', auth()->id());
        }
        return [
            'posts' => $posts,
        ];
    }
}