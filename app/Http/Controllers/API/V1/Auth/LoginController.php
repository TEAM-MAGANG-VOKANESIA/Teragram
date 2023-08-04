<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ], [
            'email.required' => "Email cannot be empty.",
            'email.exists' => "These credentials do not match our records.",
            'email.email' => 'Invalid e-mail format.',
            'password.required' => "Password cannot be empty.",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        } elseif (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;
            return response()->json([
                'success' => true,
                'token' => $token,
            ]);
        } else {
            $validator->errors()->add('password', 'Wrong password');
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
