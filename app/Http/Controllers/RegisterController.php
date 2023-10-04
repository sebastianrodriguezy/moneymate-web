<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function show()
  {
    return view('auth.register');
  }

  public function register(RegisterRequest $request)
  {
    $userID = Str::orderedUuid()->toString();
    $requestData = $request->validated();
    $newUserData = ['user_id' => $userID, ...$requestData];

    $user = User::create($newUserData);
    return redirect('/login')->with('message', 'User created succesfully');
  }
}
