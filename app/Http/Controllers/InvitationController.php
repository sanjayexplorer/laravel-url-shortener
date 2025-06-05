<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function showAcceptForm($token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        if ($invitation->accepted) {
            return "This invitation has already been accepted.";
        }

        if ($invitation->expires_at->isPast()) {
            return "This invitation has expired.";
        }

        return view('invitations.accept', compact('invitation'));
    }

    public function acceptInvitation(Request $request, $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();

        if ($invitation->accepted || $invitation->expires_at->isPast()) {
            return redirect()->route('login')->withErrors('Invalid or expired invitation.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $invitation->email,
            'password' => Hash::make($request->password),
            'company_id' => $invitation->company_id,
        ]);

        $user->assignRole($invitation->role);

        $invitation->accepted = true;
        $invitation->save();

        Auth::login($user);

        $role = $user->roles->pluck('name')->first();

        return match ($role) {
            'Admin' => redirect()->route('admin.dashboard')->with('success', 'Welcome, Admin!'),
            'Member' => redirect()->route('member.dashboard')->with('success', 'Welcome, Member!'),
            default => redirect()->route('login')->with('error', 'Unauthorized role.'),
        };

    }
}
