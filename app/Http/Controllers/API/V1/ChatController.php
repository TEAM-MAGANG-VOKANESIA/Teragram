<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Roomchat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Roomchat::where('user1_id', auth()->id())
            ->orWhere('user2_id', auth()->id())
            ->with(['user1', 'user2', 'lastMessage'])
            ->latest('id')
            ->get();

        return response()->json([
            'success' => true,
            'userId' => auth()->id(),
            'chats' => $chats,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user2_id' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $checkRoomchat = Roomchat::where([['user1_id', auth()->id()], ['user2_id', $request->user2_id]])->orWhere([['user1_id', $request->user2_id], ['user2_id', auth()->id()]])->first();

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

            return response()->json([
                'success' => true,
                'message' => $message,
            ]);
        }

        $message = Message::create([
            'roomchat_id' => $checkRoomchat->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    public function show(string $id)
    {
        $roomchat = Roomchat::where('id', $id)->with(['message', 'message.user', 'user1', 'user2'])->first();

        if ($roomchat == null) {
            return response()->json([
                'success' => false,
                'message' => 'Conversations not found'
            ]);
        }

        if ($roomchat->user1_id == auth()->id() || $roomchat->user2_id == auth()->id()) {
            if ($roomchat->user1_id == auth()->id()) {
                $interlocutor = $roomchat->user2;
                return response()->json([
                    'success' => true,
                    'interlocutor' => $interlocutor,
                    'chats' => $roomchat,
                ]);
            } else {
                $interlocutor = $roomchat->user1;
                return response()->json([
                    'success' => true,
                    'interlocutor' => $interlocutor,
                    'chats' => $roomchat
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'You do not have permission to view this conversation',
        ]);
    }

    public function searchUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'searchValue' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $results = User::where('name', 'like', '%' . $request->searchValue . '%')->get();
        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
