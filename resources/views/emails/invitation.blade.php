<!DOCTYPE html>
<html>
<head>
    <title>Invitation to join</title>
</head>
<body>
    <p>Hello,</p>
    <p>You have been invited to join our platform as a <strong>{{ $invitation->role }}</strong>.</p>
    <p>Please click the link below to accept the invitation and register:</p>
    <p><a href="{{ $inviteUrl }}">{{ $inviteUrl }}</a></p>
    <p>This link will expire on {{ $invitation->expires_at->format('Y-m-d H:i') }}.</p>
    <p>Thank you!</p>
</body>
</html>
