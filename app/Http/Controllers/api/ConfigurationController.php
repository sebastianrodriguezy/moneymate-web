<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserConfig;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
  public function updateTheme(Request $request)
  {
    $request->validate([
      'theme' => 'required|in:dark,light',
      'user_id' => 'required|exists:users,user_id'
    ]);

    $fields = $request->only(['theme', 'user_id']);
    $config = UserConfig::firstWhere('fk_user_id', $fields['user_id']);

    if ($config === null) {
      return response()->json(
        [
          "status" => 404,
          "message" => "Not user founded"
        ]
      );
    }

    $config->theme = $fields['theme'];
    $config->save();

    return response()->json(
      [
        "status" => 200,
        "message" => "User config updated"
      ]
    );
  }
}
