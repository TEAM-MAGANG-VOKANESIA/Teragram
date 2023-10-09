<?php

namespace App\Services;

use App\Models\Message;
use App\Models\Roomchat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChatService
{
    public function index()
    {
        try {
            $userId = Auth::id();
            $chats = Roomchat::where(function ($query) use ($userId) {
                $query
                    ->where('user1_id', $userId)
                    ->orWhere('user2_id', $userId);
            })
            ->with(['user1', 'user2', 'lastMessage'])
            ->get()
            ->sortByDesc(function($chats) {
                return optional($chats->lastMessage)->id;
            })->values();
            return [
                'success' => true,
                'userId' => $userId,
                'chats' => $chats,
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
                'user2_id' => 'required',
                'message' => 'required',
            ]);
    
            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }

            $checkRoomchat = Roomchat::where(function ($query) use ($request) {
                $query
                    ->where('user1_id', auth()->id())
                    ->where('user2_id', $request->user2_id)
                    ->orWhere('user1_id', $request->user2_id)
                    ->where('user2_id', auth()->id());
            })->first();
    
            if ($checkRoomchat == null) {
                $roomchat = Roomchat::create([
                    'user1_id' => auth()->id(),
                    'user2_id' => $request->user2_id,
                ]);
    
                $message = Message::create([
                    'roomchat_id' => $roomchat->id,
                    'user_id' => auth()->id(),
                    'message' => $request->message,
                ]);

                DB::commit();

                return [
                    'success' => true,
                    'message' => $message,
                ];
            }
    
            $message = Message::create([
                'roomchat_id' => $checkRoomchat->id,
                'user_id' => auth()->id(),
                'message' => $request->message,
            ]);

            DB::commit();
    
            return [
                'success' => true,
                'message' => $message,
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function show(string $id)
    {
        $roomchat = Roomchat::where('id', $id)
            ->with([
                'message' => function($query) {
                    $query->select('id', 'roomchat_id', 'user_id', 'message', 'updated_at');
                },
                'message.user' => function($query) {
                    $query->select('id', 'name');
                },
                'user1:id,name,email,profile_image,about,city',
                'user2:id,name,email,profile_image,about,city',
            ])->first([
                'id',
                'user1_id',
                'user2_id',
                'created_at',
            ]);

        if ($roomchat == null) {
            return [
                'success' => false,
                'message' => 'Conversation not found'
            ];
        }

        if ($roomchat->user1_id == auth()->id() || $roomchat->user2_id == auth()->id()) {
            if ($roomchat->user1_id == auth()->id()) {
                $interlocutor = $roomchat->user2;
                return [
                    'success' => true,
                    'interlocutor' => $interlocutor,
                    'chats' => $roomchat,
                ];
            } else {
                $interlocutor = $roomchat->user1;
                return [
                    'success' => true,
                    'interlocutor' => $interlocutor,
                    'chats' => $roomchat
                ];
            }
        }

        return [
            'success' => false,
            'message' => 'You do not have permission to view this conversation',
        ];
    }

    public function searchUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'searchValue' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
            ];
        }

        $results = User::where('name', 'like', '%' . $request->searchValue . '%')->where('id', '!=', auth()->id())->get();
        return [
            'success' => true,
            'results' => $results,
        ];
    }

    public function editMessage(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'roomchatId' => 'required',
                'messageId' => 'required',
                'newMessage' => 'required',
            ]);
    
            if ($validator->fails()) {
                return [
                    'success' => false,
                    'errors' => $validator->errors(),
                ];
            }
    
            $roomchat = Roomchat::where('id', $request->roomchatId)->first();
            
            if ($roomchat === null) {
                return [
                    'success' => false,
                    'message' => 'Roomchat not found'
                ];
            }
    
            if ($roomchat->user1_id !== auth()->id() || $roomchat->user1_id !== auth()->id()) {
                return [
                    'success' => false,
                    'message' => 'You\'re not allowed to see this conversation',
                ];
            }

            $message = Message::where('id', $request->messageId)->first();
    
            if ($message === null) {
                return [
                    'success' => false,
                    'message' => 'Message not found',
                ];
            }
        
            if ($message->user_id !== auth()->id()) {
                return [
                    'success' => false,
                    'message' => 'Can\'t edit this message (not owned)',
                ];
            }
            
            if ($message->roomchat_id !== $roomchat->id) {
                return [
                    'success' => false,
                    'message' => 'Can\'t edit this message (this message not from this roomchat)',
                ];
            }
            
            $message->update([
                'message' => $request->newMessage,
            ]);
            DB::commit();
        
            return [
                'success' => true,
                'message' => 'Successfull edit message',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'message' => 'Service error',
                'errors' => $e,
            ];
        }
    }

    public function deleteMessage(string $messageId)
    {
        DB::beginTransaction();
        try {
            $message = Message::where('id', $messageId)->first();

            if ($message === null) {
                return [
                    'success' => false,
                    'message' => 'Message not found',
                ];
            }

            if ($message->user_id !== auth()->id()) {
                return [
                    'success' => false,
                    'message' => 'Can\'t delete message (not owned)',
                ];
            }

            $message->delete();
            DB::commit();

            return [
                'success' => true,
                'message' => 'Successfull delete message',
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