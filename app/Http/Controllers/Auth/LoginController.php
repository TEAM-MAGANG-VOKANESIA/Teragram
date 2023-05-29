<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return 'Ini Halaman Home';
        } else {
            return 'login gagal';
        }
    }
}
