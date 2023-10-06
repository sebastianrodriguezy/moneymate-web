<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
  public function show(Request $request)
  {
    $remember_user = $request->cookie('remember_user');
    $data = [
      'remember_user' => $remember_user
    ];

    return view('auth.login', $data);
  }

  public function authenticate(LoginRequest $request)
  {
    $request->validated();

    $credentials = $request->only(['email', 'password']);
    $remember_user = $request->remember_user;

    if (Auth::attempt($credentials)) {
      /** @var \App\Models\User $user **/
      $user = Auth::user();

      $token = $user->createToken('authToken')->plainTextToken;
      $cookie = cookie('auth_token', $token, (60 * 24) * 7);
      if ($remember_user == 'on') {
        $remember_cookie = cookie('remember_user', $request->email);
      } else {
        $remember_cookie = cookie('remember_user', null);
      }

      return redirect('/home')->withCookies([$cookie, $remember_cookie]);
    }

    return redirect('/login')->withErrors(['invalid_credentials' => __('auth.invalid')]);
  }

  public function logout(Request $request): RedirectResponse
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirectLocale('/login', $request)->with(['status' => __('messages.logout')]);
  }
}
