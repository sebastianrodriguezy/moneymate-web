<?php

use Illuminate\Http\Request;

function redirectLocale(string $to, ?Request $request = null)
{
  $hasLocaleSession = $request && $request->hasCookie('locale');
  $locale = $hasLocaleSession ? $request->cookie('locale') : config('app.locale');

  app()->setLocale($locale);

  return redirect($locale . '/' . ltrim($to, '/'));
}
