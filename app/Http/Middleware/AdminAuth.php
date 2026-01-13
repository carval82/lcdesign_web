<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     * Simple token-based authentication for admin panel
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if admin token cookie exists
        $token = $request->cookie('admin_token');
        
        // Valid token (hash of password)
        $validToken = hash('sha256', 'lcdesign2024_admin_secret');
        
        if ($token === $validToken) {
            return $next($request);
        }
        
        // Redirect to custom login
        return redirect('/admin-login');
    }
}
