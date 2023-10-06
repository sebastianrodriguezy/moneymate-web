<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Models\UserConfig;
use Illuminate\Support\Facades\DB;

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
    $userConfigData = [
      'fk_user_id' => $userID,
      'modal_movement_behaviour' => 'still',
      'theme' => 'light'
    ];

    DB::transaction(function ()  use ($newUserData, $userConfigData) {
      User::create($newUserData);
      UserConfig::create($userConfigData);
    });

    return redirect('/login')->with(['status' => __('auth.registered')]);
  }
}
