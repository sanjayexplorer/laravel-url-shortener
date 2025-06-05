@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Welcome Admin</h1>
    <p><a href="{{ route('admin.invite.create') }}">Invite User (Admin or Member)</a></p>
    <p><a href="{{ route('admin.short-urls.index') }}">View Short URLs</a></p>
    <p><a href="{{ route('admin.short-urls.create') }}">Create Short URL</a></p>
@endsection
