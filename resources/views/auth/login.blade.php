<form method="POST" action="{{ url('/login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
