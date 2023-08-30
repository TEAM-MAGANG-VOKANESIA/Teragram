<?php

namespace App\Services\Authentication;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterService
{
    public function store($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'error' => $validator->errors(),
            ];
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return [
            'success' => true,
            'message' => 'Berhasil Register',
        ];
    }
}