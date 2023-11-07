<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  public function show()
  {
    $user = auth()->user();
    $tableCols = [
      'ID',
      __('messages.categoriesTableColName'),
      __('messages.categoriasTableColColor'),
      __('messages.movementsTableColCreated'),
    ];

    return view('home.categories', [
      'user' => $user,
      'tableCols' => $tableCols
    ]);
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

  public function categories(Request $request)
  {
    $fields = $request->validate([
      'limit' => 'nullable|numeric|min:1',
      'page' => 'nullable|numeric|min:1',
    ]);

    $user = $request->user();

    $limit = 50;
    $page = isset($fields['page']) ? (int) $fields['page'] : 1;
    $offset = $page === 1 ? 0 : ($page * $limit) - $limit;

    $query = Category::select(
      'category_id as id',
      'name',
      'color',
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
      "message" => "categories obtained succesfully",
      "data" => $data,
    ]);
  }
}
