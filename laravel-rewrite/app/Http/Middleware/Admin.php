<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
  /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle(Request $request, Closure $next): Response
  {
    $user = Auth::user();
    $admin_whitlist = config("app.admins");
    foreach ($admin_whitlist as $admin) {
      if ($user->email === $admin) {
        return $next($request);
      }
    }

    return redirect("/");
  }
}
