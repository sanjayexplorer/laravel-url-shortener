@extends('layouts.app')

@section('title', 'SuperAdmin Dashboard')

@section('content')
<h1>Welcome, SuperAdmin</h1>

<ul>
    <li><a href="{{ route('superadmin.invite-admin.create') }}">Invite Admin to New Company</a></li>
    <li><a href="{{ route('superadmin.short-urls.index') }}">View All Short URLs</a></li>
</ul>
@endsection
