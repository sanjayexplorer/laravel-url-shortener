<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Invitation;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;
    public $inviteUrl;

    public function __construct(Invitation $invitation, $inviteUrl)
    {
        $this->invitation = $invitation;
        $this->inviteUrl = $inviteUrl;
    }

    public function build()
    {
        return $this->subject('You are invited to join')
                    ->view('emails.invitation');
    }
}
