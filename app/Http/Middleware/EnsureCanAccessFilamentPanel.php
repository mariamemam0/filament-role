<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCanAccessFilamentPanel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // If user is logged in but can't access panel → 403
       // if ($user && ! $this->canAccessPanel($user)) {
       //     abort(403, 'You do not have permission to access this admin panel.');
       // }

        return $next($request);
    }

    //protected function canAccessPanel($user): bool
    //{
      //  return $user->hasRole(['Admin','writer','moderator']);
    //}
}
