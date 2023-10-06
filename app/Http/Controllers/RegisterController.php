<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

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
    return redirect('/login')->with(['success' => 'User created succesfully']);
  }
}
