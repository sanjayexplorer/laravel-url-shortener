@extends('layouts.app')

@section('title', 'Invite User')

@section('content')
    <h2>Invite Admin or Member</h2>

    <form method="POST" action="{{ route('admin.invite.store') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Role:</label>
        <select name="role" required>
            <option value="Admin">Admin</option>
            <option value="Member">Member</option>
        </select><br>

        <button type="submit">Invite</button>
    </form>
@endsection
