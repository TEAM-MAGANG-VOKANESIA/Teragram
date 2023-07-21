<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestUploadImageController extends Controller
{
    public function index()
    {
        return view('test-upload-image-ajax');
    }

    public function post(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('post', $imageName, 'public');

            return response()->json([
                'success' => true,
                'image' => $imageName,
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Tidak ada file yang diunggah.']);
        }
    }
}
