<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->is_Admin === '1' || strtolower($request->user()->is_Admin) === 'true')) {
            return $next($request);
        }

        return redirect()->route('dashboard.user.dashboard.user')->with('error', 'You do not have permission to access this page.');
    }
}
