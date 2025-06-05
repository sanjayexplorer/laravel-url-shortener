<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use App\Models\Company;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InviteController extends Controller
{
    public function create()
    {
        return view('superadmin.users.invite');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|unique:invitations,email',
        ]);

        $company = Company::create([
            'name' => $request->company_name,
        ]);

        $invitation = Invitation::create([
            'email' => $request->email,
            'role' => 'Admin',
            'company_id' => $company->id,
            'invited_by' => Auth::id(),
        ]);

        $inviteUrl = route('invitations.accept', $invitation->token);

        Mail::to($invitation->email)->send(new InvitationMail($invitation, $inviteUrl));

        return back()->with('success', "Invitation sent! Invite URL: $inviteUrl");
    }
}
