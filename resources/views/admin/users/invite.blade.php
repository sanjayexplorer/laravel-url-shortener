@extends('layouts.app')

@section('title', 'Invite User')

@section('content')
<div class="max-w-xl mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Invite Admin or Member</h2>

    <form method="POST" action="{{ route('admin.invite.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-2">Name</label>
            <input
                type="text"
                name="name"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="John Doe"
            >
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input
                type="email"
                name="email"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="john@example.com"
            >
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Role</label>
            <select
                name="role"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="Admin">Admin</option>
                <option value="Member">Member</option>
            </select>
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition"
        >
            Invite
        </button>
    </form>
</div>
@endsection
