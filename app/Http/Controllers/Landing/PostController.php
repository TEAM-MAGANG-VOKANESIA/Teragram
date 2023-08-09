<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function storeImage(Request $request)
    {
        dd($request);
        if ($request->hasFile('file')) {
            $imagePath = $request->file('image')->store('post', 'public');

            $post = new Post([
                'user_id' => auth()->id(),
                'image' => $imagePath,
            ]);
            $post->save();

            return response()->json([
                'success' => true,
                'image' => $imagePath,
                'postId' => $post->id,
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Tidak ada file yang diunggah.']);
        }
    }

    public function storeCaption(Request $request)
    {
        $post = Post::where('id', $request->postId)->first();
        $post->caption = $request->caption;
        $post->save();

        return redirect()->back();
    }
}
