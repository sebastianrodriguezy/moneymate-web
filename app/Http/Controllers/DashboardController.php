<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function show()
  {
    $user = auth()->user();
    return view('home.dashboard', ['user' => $user]);
  }
}
