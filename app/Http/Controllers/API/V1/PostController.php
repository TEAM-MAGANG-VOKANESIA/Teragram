<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $imagePath = $request->file('image')->store('post', 'public');

        $data = Post::create([
            'user_id' => auth()->id(),
            'image' => $imagePath,
            'caption' => $request->caption
        ]);

        return response()->json([
            'success' => true,
            'message' => 'berhasil upload postingan',
            'data' => $data,
        ]);
    }

    public function storeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postId' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        Comment::create([
            'post_id' => $request->postId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Success post comment'
        ]);
    }

    public function showComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postId' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $comment = Comment::where('post_id', $request->postId)->get();

        if ($comment->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'comment not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'comment' => $comment,
        ]);
    }
}
