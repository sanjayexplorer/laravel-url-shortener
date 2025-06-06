@extends('layouts.app')

@section('title', 'Create Short URL')

@section('content')
<div class="max-w-xl mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create New Short URL</h2>

    <form method="POST" action="{{ route('member.short-urls.store') }}" class="space-y-4">
        @csrf

        <div>
            <label for="original_url" class="block text-sm font-medium text-gray-700 mb-1">Original URL:</label>
            <input
                type="url"
                name="original_url"
                id="original_url"
                required
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <div>
            <button
                type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition"
            >
                Generate Short URL
            </button>
        </div>
    </form>
</div>
@endsection
