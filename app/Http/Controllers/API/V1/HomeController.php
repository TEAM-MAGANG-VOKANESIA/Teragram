<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest('id')->get();
        return response()->json($posts);
    }
}
