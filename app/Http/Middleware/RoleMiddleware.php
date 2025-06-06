<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        Log::info('CheckRole Middleware executing...', ['roles' => $roles]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $user = Auth::user();
        $userRole = $user->roles->first()?->name;

        Log::info('Authenticated user role: ' . $userRole);

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        return $this->redirectToOwnDashboard($request, $userRole);
    }

    private function redirectToOwnDashboard($request, $role)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'Unauthorized role. Expected one of allowed roles.',
            ], 403);
        }

        switch (strtolower($role)) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard')
                    ->with('error', 'You do not have access to that page.');
            case 'admin':
                return redirect()->route('admin.dashboard')
                    ->with('error', 'You do not have access to that page.');
            case 'member':
                return redirect()->route('member.dashboard')
                    ->with('error', 'You do not have access to that page.');
            default:
                Auth::logout();
                return redirect()->route('login')->with('error', 'Unauthorized role.');
        }
    }
}
