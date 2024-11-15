<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {
    public function register(Request $request) {
        $request->validate(['name' => 'required', 'password' => 'required','role' => 'required']);
       
        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            ]);
            if (!Auth::attempt($request->only('name','password'))) {
            return response()->json(['message' => 'Invalid login
            credentials'], 401);
            }
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            ], 200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }
}
