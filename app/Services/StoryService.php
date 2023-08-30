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
                $query->select('user_id','text', 'image');
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
            if ($request->hasFile('image') && !$request->text) {
                $imagePath = $request->file('image')->store('story', 'public');
    
                Story::create([
                    'user_id' => auth()->id(),
                    'image' => $imagePath,
                ]);

                DB::commit();
    
                return [
                    'success' => true,
                    'message' => 'Successfull upload story',
                ];
            } elseif (!$request->hasFile('image') && $request->text) {
                Story::create([
                    'user_id' => auth()->id(),
                    'text' => $request->text,
                ]);

                DB::commit();
    
                return [
                    'success' => true,
                    'message' => 'Successfull upload story',
                ];
            } elseif ($request->hasFile('image') && $request->text) {
                $imagePath = $request->file('image')->store('story', 'public');
                Story::create([
                    'user_id' => auth()->id(),
                    'image' => $imagePath,
                    'text' => $request->text,
                ]);

                DB::commit();
    
                return [
                    'success' => true,
                    'message' => 'Successfull upload story',
                ];
            } else {
                DB::rollBack();
                return [
                    'success' => false,
                    'message' => 'can\'t upload story, form emty',
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

    public function show(string $id)
    {
        try {
            $stories = Story::where('user_id', $id)->with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->get([
                'id',
                'image',
                'text',
                'created_at',
                'user_id',
            ]);
    
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