<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectToLoginWithIntended
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards): Response
    {
        if (!Auth::guard($guards)->check()) {
            // Store the intended route in the session
            session(['intended' => $request->fullUrl()]);

            return redirect()->route('user/login');
        }
        return $next($request);
    }
}
