<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
  public function translate(Request $request)
  {
    $request->validate([
      't_keys' => 'required|array'
    ]);

    $keys = $request->t_keys;

    $translatedKeys = array_map(function (string $key) {
      return [
        "id" => $key,
        "name" => __('messages.' . $key)
      ];
    }, $keys);

    return response()->json([
      "status" => 200,
      "message" => "key translate succesfully",
      "data" => [
        "rows" => $translatedKeys
      ]
    ]);
  }
}
