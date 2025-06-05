<h2>Accept Invitation for {{ $invitation->email }}</h2>

<form method="POST" action="{{ route('invitations.accept.submit', $invitation->token) }}">
    @csrf
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Password:</label><br>
    <input type="text" name="password" required><br><br>

    <label>Confirm Password:</label><br>
    <input type="text" name="password_confirmation" required><br><br>

    <button type="submit">Register</button>
</form>
