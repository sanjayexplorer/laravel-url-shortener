<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $user = Auth::user();
        $userRole = $user->roles->first()?->name;

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        return $this->redirectToOwnDashboard($userRole);
    }

    private function redirectToOwnDashboard($role)
    {
        switch (strtolower($role)) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard')->with('error', 'You do not have access to that page.');
            case 'admin':
                return redirect()->route('admin.dashboard')->with('error', 'You do not have access to that page.');
            case 'member':
                return redirect()->route('member.dashboard')->with('error', 'You do not have access to that page.');
            default:
                Auth::logout();
                return redirect()->route('login')->with('error', 'Unauthorized role.');
        }
    }
}
