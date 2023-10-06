<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localized
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (!$routeLocale = $request->route()->parameter('locale')) {
      return redirect($this->localizedUrl($request->path()));
    }

    if (!in_array($routeLocale, array_keys(config('app.available_locales')))) {
      return redirect($this->localizedUrl($request->path()));
    }

    $request->session()->put('locale', $routeLocale);
    app()->setLocale($routeLocale);

    return $next($request);
  }

  private function localizedUrl(string $path, ?string $locale = null): string
  {
    /**
     * Get the default locale if it's not defined
     */
    if (!$locale and request()->session()->has('locale')) {
      $locale = request()->session()->get('locale');
    }

    return url(trim($locale . '/' . $path, '/'));
  }
}
