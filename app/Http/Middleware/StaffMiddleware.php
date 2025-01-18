<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }

        // Access the authenticated user
        $user = auth()->user();

        // Check if the user's account status is inactive
        if ($user->account_status == 'inactive') {
            return response()->view('panel.every_state.access.access');
        }

        // Check the user's role
        if ($user->user_role == 'staff') {
            return $next($request);
        }

        // Deny access for other roles
        abort(403, 'Unauthorized action.');
    }

}
