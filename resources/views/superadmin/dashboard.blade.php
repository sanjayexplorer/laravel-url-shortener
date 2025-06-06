@extends('layouts.app')

@section('title', 'SuperAdmin Dashboard')

@section('content')
<div class="max-w-3xl bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Welcome, SuperAdmin</h1>

    <ul class="space-y-4">
        <li>
            <a href="{{ route('superadmin.invite-admin.create') }}"
               class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
               Invite Admin to New Company
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.short-urls.index') }}"
               class="inline-block bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
               View All Short URLs
            </a>
        </li>
    </ul>
</div>
@endsection
