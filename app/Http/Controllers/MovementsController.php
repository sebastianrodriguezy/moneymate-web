<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovementsController extends Controller
{
  public function show()
  {
    $user = auth()->user();

    return view('home.movements', ['user' => $user]);
  }
}
