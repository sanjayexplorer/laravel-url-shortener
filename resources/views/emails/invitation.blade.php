<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>You're Invited!</title>
</head>
<body>
    <div class="container">
        <h2>Hello,</h2>
        <p>You have been invited to join our platform as a <strong>{{ ucfirst($invitation->role) }}</strong>.</p>

        <p>Please click the button below to accept your invitation and complete registration:</p>

        <p><a href="{{ $inviteUrl }}" class="btn">Accept Invitation</a></p>

        <p>If the button doesn't work, copy and paste this link into your browser:</p>
        <p><a href="{{ $inviteUrl }}">{{ $inviteUrl }}</a></p>

        <p>This link will expire on <strong>{{ $invitation->expires_at->format('Y-m-d H:i') }}</strong>.</p>

        <div class="footer">
            <p>Thank you,<br>The Team</p>
        </div>
    </div>
</body>
</html>
