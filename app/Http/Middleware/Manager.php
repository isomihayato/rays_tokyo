<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Manager
{
    private $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty(auth()->user())) {
          return redirect()->route('login');
        }

        if (auth()->user()->role < 7) {
          $this->auth = true;
          return $next($request);
        }

        return redirect()->route('login')->with('error', '権限がありません');
    }
}
