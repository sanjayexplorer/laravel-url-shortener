@extends('layouts.app')

@section('title', 'Member Dashboard')

@section('content')
<div class="max-w-3xl mt-10 p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome, Member</h1>

    <div class="space-y-4">
        <a
            href="{{ route('member.short-urls.index') }}"
            class="block w-full text-center bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition"
        >
            View Short URLs
        </a>

        <a
            href="{{ route('member.short-urls.create') }}"
            class="block w-full text-center bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition"
        >
            Create Short URL
        </a>
    </div>
</div>
@endsection
