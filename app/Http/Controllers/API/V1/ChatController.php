<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\ChatService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(ChatService $chatService)
    {
        try {
            $chatResponse = $chatService->index();
            return response()->json($chatResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function store(Request $request, ChatService $chatService)
    {
        try {
            $chatResponse = $chatService->store($request);
            return response()->json($chatResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function show(string $id, ChatService $chatService)
    {
        try {
            $chatResponse = $chatService->show($id);
            return response()->json($chatResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    public function searchUser(Request $request, ChatService $chatService)
    {
        try {
            $chatResponse = $chatService->searchUser($request);
            return response()->json($chatResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
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
