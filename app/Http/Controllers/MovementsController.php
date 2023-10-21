<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovementsController extends Controller
{
  public function show()
  {
    $user = auth()->user();
    $tableCols = ['Cantidad', 'Tipo', 'Categoria', 'Persona', 'Fecha', 'Creación'];

    return view('home.movements', [
      'user' => $user,
      'tableCols' => $tableCols
    ]);
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

  public function getMovements(Request $request)
  {
    $fields = $request->validate([
      'page' => 'nullable|numeric|min:1',
      'type' => 'nullable|in:discharge,income',
      'category_id' => 'nullable|exists:categories,category_id',
      'person_id' => 'nullable|exists:persons,person_id',
    ]);

    $user = $request->user();

    $limit = 10;
    $page = isset($fields['page']) ? (int) $fields['page'] : 1;
    $offset = $page === 1 ? 0 : ($page * $limit) - $limit;

    $query = Movement::select(
      'movement_id as id',
      'fk_category_id',
      'fk_person_id',
      'type',
      'amount',
      'movement_date',
      'comments',
      'created_at as date'
    )
      ->where('fk_user_id', '=', $user->user_id);

    if (isset($fields['type']))
      $query = $query->where('type', '=', $fields['type']);

    if (isset($fields['category_id']))
      $query = $query->where('fk_category_id', '=', $fields['category_id']);

    if (isset($fields['person_id']))
      $query = $query->where('fk_person_id', '=', $fields['person_id']);

    $count = $query->count();
    $results = $query->skip($offset)
      ->take($limit)
      ->orderBy('movement_date', 'desc')
      ->get()
      ->toArray();

    $populatedResults = [];

    foreach ($results as $movement) {
      $category = DB::table('categories')
        ->select('name', 'color')
        ->where('category_id', $movement['fk_category_id'])
        ->first();

      $person = DB::table('persons')
        ->select('name')
        ->where('person_id', $movement['fk_person_id'])
        ->first();

      unset(
        $movement['fk_category_id'],
        $movement['fk_person_id']
      );

      $populatedResults[] = [
        ...$movement,
        "person" => isset($person) ? $person->name : null,
        "category" => $category,
      ];
    }

    $data = [
      "totalRows" => count($populatedResults),
      "count" => $count,
      "rows" => $populatedResults,
      "offset" => $offset,
      "page" => $page
    ];

    return response()->json([
      "status" => 200,
      "message" => "movements obtained succesfully",
      "data" => $data,
    ]);
  }
}
