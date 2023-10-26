<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('nik', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            return response()->json([
                'user' => $user,
                'access_token' => $token,
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
