@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-4xl mt-10 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome, Admin</h1>

    <div class="space-y-4">
        <a href="{{ route('admin.invite.create') }}"
           class="block px-4 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Invite User (Admin or Member)
        </a>

        <a href="{{ route('admin.short-urls.index') }}"
           class="block px-4 py-3 bg-green-600 text-white rounded hover:bg-green-700 transition">
            View Short URLs
        </a>

        <a href="{{ route('admin.short-urls.create') }}"
           class="block px-4 py-3 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
            Create Short URL
        </a>
    </div>
</div>
@endsection
