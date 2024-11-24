<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * AuthenticateController
 *
 * @class App\Http\Controllers\Api\AuthenticateController
 * @package App\Http\Controllers\Api
 */
class AuthenticateController extends Controller
{
    /**
     * Get a login token
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        try {
            $credentials = $request->validate([
                'email'    => 'email|required',
                'password' => 'required'
            ]);

            if (!Auth::attempt($credentials)) {
                throw new Exception('Unable to authorize');
            }

            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Unable to authorize');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'token' => $tokenResult,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 401);
        }
    }
}
