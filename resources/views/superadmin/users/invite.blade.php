@extends('layouts.app')

@section('content')
<div class="max-w-xl mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Invite Admin (with New Company)</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('superadmin.invite-admin.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-1">Company Name</label>
            <input
                type="text"
                name="company_name"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Admin Email</label>
            <input
                type="email"
                name="email"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition"
        >
            Send Invitation
        </button>
    </form>
</div>
@endsection
