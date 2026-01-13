<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AdminAuth
{
    /**
     * Handle an incoming request.
     * Simple token-based authentication for admin panel
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if admin token cookie exists (Laravel encrypts cookies)
        $token = $request->cookie('admin_token');
        
        // Valid token (hash of password)
        $validToken = hash('sha256', 'lcdesign2024_admin_secret');
        
        // Debug: Log token comparison
        \Log::info('Admin Auth Check', [
            'token_received' => $token,
            'token_expected' => $validToken,
            'match' => $token === $validToken
        ]);
        
        if ($token === $validToken) {
            return $next($request);
        }
        
        // Redirect to custom login
        return redirect('/admin-login');
    }
}
