<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Deployer\Component\PharUpdate\Update;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function storeImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('post', $imageName, 'public');

            $post = new Post([
                'user_id' => auth()->id(),
                'image' => $imageName,
            ]);
            $post->save();

            return response()->json([
                'success' => true,
                'image' => $imageName,
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
