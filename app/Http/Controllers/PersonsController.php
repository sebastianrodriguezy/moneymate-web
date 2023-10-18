<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
  public function show()
  {
    $user = auth()->user();

    return view('home.persons', ['user' => $user]);
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
}
