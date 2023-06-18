<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('main')->plainTextToken;
    
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        } else {
            return response()->json('Incorrect login credentials', 200);
        }
    
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function signup(SignupRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('API TOKEN')->PlainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json('', 204);
    }
}
