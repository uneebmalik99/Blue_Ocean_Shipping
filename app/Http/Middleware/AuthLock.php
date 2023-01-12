<?php

namespace App\Http\Middleware;

use Closure;
class AuthLock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!auth()->user()){
           return $next($request);
        }
        // If the user does not have this feature enabled, then just return next.
        if (!auth()->user()->hasLockoutTime()) {
            // Check if previous session was set, if so, remove it because we don't need it here.
            if (session('lock-expires-at')) {
                session()->forget('lock-expires-at');
            }
            return $next($request);
        }

        if ($lockExpiresAt = session('lock-expires-at')) {
            if ($lockExpiresAt < now()) {
                return redirect()->route('lock');
            }
        }

        session(['lock-expires-at' => now()->addMinutes($request->user()->getLockoutTime())]);
        
        $response = $next($request);

  return $response->header('Cache-Control','nocache, no-store, max-age=0,     must-revalidate')
  ->header('Pragma','no-cache') //HTTP 1.0
  ->header('Expires','Sat, 01 Jan 1990 00:00:00 GMT'); // // Date in the past
    }
}
