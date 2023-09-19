<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function myProfile(ProfileService $profileService)
    {
        try {
            $profileResponse = $profileService->myProfile();
            return response()->json($profileResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ProfileService $profileService)
    {
        try {
            $profileResponse = $profileService->show($id);
            return response()->json($profileResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileService $profileService)
    {
        try {
            $profileResponse = $profileService->update($request);
            return response()->json($profileResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ProfileService $profileService)
    {
        try {
            $profileResponse = $profileService->destroy($id);
            return response()->json($profileResponse);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'errors' => $e,
            ]);
        }
    }
}
