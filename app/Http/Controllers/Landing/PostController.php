<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function storeImage()
    {
        return response()->json([
            'success' => true,
            'message' => 'berhasil upload image',
        ]);
    }

    public function storeCaption()
    {
        
    }
}
