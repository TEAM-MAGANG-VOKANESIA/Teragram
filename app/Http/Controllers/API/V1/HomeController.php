<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->withCount(['countComments', 'likes'])->latest('id')->paginate(10);
        foreach ($posts as $post) {
            $post->isLike = $post->likes->contains('user_id', auth()->id());
        }
        return response()->json($posts);
    }
}
