@extends('layouts.app')

@section('content')
    <h2>Invite Admin (with New Company)</h2>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('superadmin.invite-admin.store') }}">
        @csrf

        <div>
            <label>Company Name</label>
            <input type="text" name="company_name" required>
        </div>

        <div>
            <label>Admin Email</label>
            <input type="email" name="email" required>
        </div>

        <button type="submit">Send Invitation</button>
    </form>
@endsection
