<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\HomeService;

class HomeController extends Controller
{
    public function index(HomeService $homeService)
    {
        try {
            $homeResponse = $homeService->index();
            return response()->json($homeResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }
}
