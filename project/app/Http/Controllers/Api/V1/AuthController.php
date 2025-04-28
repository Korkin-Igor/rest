<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(StoreUserRequest $request): string
    {
        User::query()->create($request->all());
        return response()->json([
            'message' => 'User registered successfully'
        ], 201);
    }

    public function login(LoginUserRequest $request): string
    {
        if (!Auth::attempt($request->all())) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $user = Auth::user();
        return response()->json([
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $user->createToken('token')->plainTextToken,
            ]
        ]);
    }

    public function logout()
    {

    }

}
