<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }

        $userRole = auth()->user()->role;

        // Admin memiliki akses penuh
        if ($userRole === 'admin') {
            return $next($request);
        }

        // Periksa role lainnya
        if (!in_array($userRole, explode('|', $role))) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }

}
