<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;


class InviteController extends Controller
{
    public function create()
    {
        return view('admin.users.invite');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email|unique:invitations,email',
            'role' => 'required|in:Admin,Member',
        ]);

        $invitation = Invitation::create([
            'email' => $request->email,
            'role' => $request->role,
            'company_id' => Auth::user()->company_id,
            'invited_by' => Auth::id(),
        ]);

        $inviteUrl = route('invitations.accept', $invitation->token);

        Mail::to($invitation->email)->send(new InvitationMail($invitation, $inviteUrl));

        return back()->with('success', "Invitation created! Invite URL: $inviteUrl");
    }
}
