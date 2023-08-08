<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'caption' => 'string',
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $imagePath = $request->file('image')->store('post', 'public');

        $data = Post::create([
            'user_id' => $request->user_id,
            'image' => $imagePath,
            'caption' => $request->caption
        ]);

        return response()->json([
            'success' => true,
            'message' => 'berhasil upload postingan',
            'data' => $data,
        ]);
    }
}
