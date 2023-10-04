<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
  public function login(LoginRequest $request)
  {
    $request->validated();

    $credentials = $request->only(['email', 'password']);

    if (!Auth::attempt($credentials)) {
      return response()->json(
        [
          "status" => 401,
          "message" => "Invalid credentials"
        ],
        401
      );
    }

    $user = User::where('email', $request->email)->first();
    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json(
      [
        "status" => 200,
        "message" => "Logged Succesfully",
        "user" => $user,
        "token" => $token,
      ]
    );
  }

  public function register(RegisterRequest $request)
  {
    $userID = Str::orderedUuid()->toString();
    $requestData = $request->validated();
    $newUserData = ['user_id' => $userID, ...$requestData];

    $user = User::create($newUserData);
    return response()->json(
      [
        "status" => 201,
        "message" => "User created succesfully",
        "user" => $user
      ],
      201
    );
  }

  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();

    return response()->json(
      [
        "status" => 200,
        "message" => "Logged out successfully",
      ],
      200
    );
  }
}
