<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostService
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);

            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }

            $imagePath = $request->file('image')->store('post', 'public');

            $data = Post::create([
                'user_id' => auth()->id(),
                'image' => $imagePath,
                'caption' => $request->caption
            ]);

            DB::commit();

            return [
                'success' => true,
                'message' => 'Successfull upload post',
                'data' => $data,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'message' => 'Service Error',
                'errors' => $e,
            ];
        }
    }

    public function deletePost(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'postId' => 'required',
            ]);

            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }

            $post = Post::where('id', $request->postId)->first();

            if ($post == null) {
                return [
                    'success' => false,
                    'message' => 'Post not found',
                ];
            }

            if ($post->user_id == auth()->id()) {
                Storage::disk('public')->delete($post->image);
                $post->delete();
                DB::commit();
                return [
                    'success' => true,
                    'message' => 'Successfull delete post',
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'you\'re not allowew to delete this post',
                ];
            }
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function storeComment(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'postId' => 'required',
                'comment' => 'required',
            ]);
    
            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }
    
            Comment::create([
                'post_id' => $request->postId,
                'user_id' => auth()->id(),
                'comment' => $request->comment,
            ]);

            DB::commit();
    
            return [
                'success' => true,
                'message' => 'Success post comment',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'message' => 'Service Error',
                'errors' => $e,
            ];
        }
    }

    public function showComment(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'postId' => 'required',
            ]);
    
            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }
    
            $comment = Comment::where('post_id', $request->postId)->with('user')->get();

            DB::commit();
    
            return [
                'success' => true,
                'comment' => $comment,
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function like(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'postId' => 'required',
            ]);
    
            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }
    
            $postLiked = Like::where('user_id', auth()->id())->where('post_id', $request->postId)->first();
    
            if ($postLiked) {
                $postLiked->delete();
                DB::commit();
                return [
                    'success' => true,
                    'message' => 'post unlike',
                ];
            }
    
            Like::create([
                'post_id' => $request->postId,
                'user_id' => auth()->id(),
            ]);

            DB::commit();
    
            return [
                'success' => true,
                'message' => 'post like',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }
}