<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Roomchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Roomchat::where('user1_id', auth()->id())
            ->orWhere('user2_id', auth()->id())
            ->with(['user1', 'user2', 'message'])
            ->latest('id')
            ->get();

        return response()->json([
            'success' => true,
            'chats' => $chats,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user1_id' => 'required',
            'user2_id' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $checkRoomchat = Roomchat::where('user1_id', $request->user1_id)->where('user2_id', $request->user2_id)->first();

        if ($checkRoomchat == null) {
            $roomchat = Roomchat::create([
                'user1_id' => $request->user1_id,
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
        $roomchat = Roomchat::where('id', $id)->with(['message', 'message.user'])->first();
        if ($roomchat->user1_id == auth()->id() || $roomchat->user2_id == auth()->id()) {
            return response()->json([
                'success' => true,
                'chats' => $roomchat,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'You do not have permission to view this conversation',
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
