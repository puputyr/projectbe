<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class AuthController extends Controller {
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string|confirmed',
            'role' => 'required|in:admin,psikolog,tim medis,tim keamanan'
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request) {
        $request->validate(['name' => 'required', 'password' => 'required']);

        $user = User::where('name', $request->name)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('api_token')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }
}
