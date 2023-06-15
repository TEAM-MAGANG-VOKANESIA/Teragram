<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
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
            return redirect()->back()->withErrors($validator)->withInput();
        } elseif (Auth::attempt($credentials)) {
            return 'Ini Halaman Home';
        } else {
            return redirect()->back()->withErrors(['password' => 'Password wrong.'])->withInput();
        }
    }
}
