<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required|min:5',
      'email' => 'required|email|unique:user,email',
      'password' => [
        'required', 
        Password::min(8)
          ->letters()
          ->mixedCase()
          ->numbers()
          ->symbols()
          ->uncompromised()
      ],
      'password_confirm' => 'required|same:password'
    ];
  }
}
