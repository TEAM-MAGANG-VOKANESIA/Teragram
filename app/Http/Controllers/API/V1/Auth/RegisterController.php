<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Services\Authentication\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request, RegisterService $registerService)
    {
        try {
            $registerResponse = $registerService->store($request);
            return response()->json($registerResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }
}
