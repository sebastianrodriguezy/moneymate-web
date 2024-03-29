<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
  public function show()
  {
    $user = auth()->user();
    $tableCols = [
      'ID',
      __('messages.personsTableColName'),
      __('messages.movementsTableColCreated'),
    ];

    return view('home.persons', [
      'user' => $user,
      'tableCols' => $tableCols
    ]);
  }

  public function newPerson(Request $request)
  {
    $person = $request->validate([
      'person_id' => 'required',
      'fk_user_id' => 'required|exists:users,user_id',
      'name' => 'required|string',
    ]);

    $personResponse = Person::create($person);

    if (!$personResponse) {
      return response()->json(
        [
          "status" => 500,
          "message" => "person not created"
        ]
      );
    }

    return response()->json(
      [
        "status" => 201,
        "message" => "person created",
        "data" => $person
      ]
    );
  }

  public function persons(Request $request)
  {
    $fields = $request->validate([
      'limit' => 'nullable|numeric|min:1',
      'page' => 'nullable|numeric|min:1',
    ]);

    $user = $request->user();

    $limit = isset($fields['limit']) ? (int) $fields['limit'] : 50;
    $page = isset($fields['page']) ? (int) $fields['page'] : 1;
    $offset = $page === 1 ? 0 : ($page * $limit) - $limit;

    $query = Person::select(
      'person_id as id',
      'name',
      'created_at as date'
    )
      ->where('fk_user_id', '=', $user->user_id);

    $count = $query->count();
    $results = $query->skip($offset)
      ->take($limit)
      ->orderBy('created_at', 'desc')
      ->get()
      ->toArray();

    $data = [
      "totalRows" => count($results),
      "count" => $count,
      "rows" => $results,
      "offset" => $offset,
      "page" => $page
    ];

    return response()->json([
      "status" => 200,
      "message" => "persons obtained succesfully",
      "data" => $data,
    ]);
  }
}
