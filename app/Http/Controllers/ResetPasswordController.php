<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as RulesPassword;

class ResetPasswordController extends Controller
{
  public function showEmail ()
  {
    return view('auth.recovery-password');
  }

  public function showReset (Request $request, string $token)
  {
    $email = $request->query('email');
    $data = ['token' => $token, 'email' => $email];

    return view('auth.reset-password', $data);
  }

  public function sendMail (Request $request)
  {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    if($status === Password::RESET_LINK_SENT) {
      return back()->with(['status' => __($status)]);
    }

    return back()->withErrors(['email' => __($status)]);
  }

  public function resetPassword (Request $request)
  {
    $credentials = $request->only('email', 'password', 'password_confirmation', 'token');

    $request->validate([
      'token' => 'required',
      'email' => 'required|email',
      'password' => RulesPassword::min(8)
        ->letters()
        ->mixedCase()
        ->numbers()
        ->symbols()
        ->uncompromised(),
      'password_confirm' => 'required|same:password'
    ]);

    $status = Password::reset(
      $credentials,
      function (User $user, string $password) {
        $user->forceFill(['password' => Hash::make($password)])
          ->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
      }
    );

    if($status === Password::PASSWORD_RESET) {
      return redirect()->route('login')->with(['status' => __($status)]);
    }

    return back()->withErrors(['email' => __($status)]);
  }
}
