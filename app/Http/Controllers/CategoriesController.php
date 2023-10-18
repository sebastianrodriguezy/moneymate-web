<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  public function show()
  {
    $user = auth()->user();

    return view('home.categories', ['user' => $user]);
  }

  public function newCategory(Request $request)
  {
    $category = $request->validate([
      'category_id' => 'required',
      'fk_user_id' => 'required|exists:users,user_id',
      'name' => 'required|string',
      'color' => 'required|json',
    ]);

    $categoryResponse = Category::create($category);

    if (!$categoryResponse) {
      return response()->json(
        [
          "status" => 500,
          "message" => "category not created"
        ]
      );
    }

    return response()->json(
      [
        "status" => 201,
        "message" => "category created",
        "data" => $category
      ]
    );
  }
}
