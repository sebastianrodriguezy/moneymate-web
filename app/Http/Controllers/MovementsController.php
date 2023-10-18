<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;

class MovementsController extends Controller
{
  public function show()
  {
    $user = auth()->user();

    return view('home.movements', ['user' => $user]);
  }

  public function newMovement(Request $request)
  {
    $movement = $request->validate([
      'movement_id' => 'required',
      'type' => 'required|in:discharge,income',
      'fk_user_id' => 'required|exists:users,user_id',
      'fk_category_id' => 'required|exists:categories,category_id',
      'fk_person_id' => 'nullable|exists:persons,person_id',
      'amount' => 'required|numeric|min:0',
      'movement_date' => 'required',
      'comments' => 'string|nullable'
    ]);

    $movementResponse = Movement::create($movement);

    if (!$movementResponse) {
      return response()->json(
        [
          "status" => 500,
          "message" => "movement not created"
        ]
      );
    }

    return response()->json(
      [
        "status" => 201,
        "message" => "movement created",
        "data" => $movement
      ]
    );
  }
}
