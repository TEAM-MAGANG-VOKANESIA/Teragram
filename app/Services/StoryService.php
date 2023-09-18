<?php

namespace App\Services;

use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StoryService
{
    public function index()
    {
        try {
            $stories = User::with(['story' => function ($query) {
                $query->select('user_id','text', 'image', 'id');
            }])->has('story')->get(['name', 'id']);
    
            return [
                'success' => true,
                'stories' => $stories,
            ];
        } catch (\Exception $e) {
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

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

            $imagePath = $request->file('image')->store('story', 'public');

            Story::create([
                'user_id' => auth()->id(),
                'image' => $imagePath,
                'text' => 'Story Image',
            ]);

            DB::commit();

            return [
                'success' => true,
                'message' => 'Successfull upload story',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'message' => 'Service error',
                'errors' => $e->getMessage(),
            ];
        }
    }

    public function show(string $id)
    {
        try {
            $user = User::where('id', $id)->first(['id', 'name']);
            $stories = Story::where('user_id', $id)->get([
                'id',
                'image',
                'text',
                'created_at',
            ]);
    
            return [
                'success' => true,
                'userStory' => $user,
                'stories' => $stories,
            ];
        } catch (\Exception $e) {
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'storyId' => 'required',
            ]);
    
            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }
    
            $story = Story::where('id', $request->storyId)->first();
    
            if ($story == null) {
                return [
                    'success' => false,
                    'message' => 'Story not found',
                ];
            }
    
            if ($story->user_id == auth()->id()) {
                Storage::disk('public')->delete($story->image);
                $story->delete();
                DB::commit();
                return [
                    'success' => true,
                    'message' => 'Successfull delete story',
                ];
            } else {
                DB::rollBack();
                return [
                    'success' => false,
                    'message' => 'You\'re not owner of the story',
                ];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }
}