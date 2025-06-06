@extends('layouts.app')

@section('title', 'Create Short URL')

@section('content')
<div class="max-w-xl mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create New Short URL</h2>

    <form method="POST" action="{{ route('admin.short-urls.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-2">Original URL</label>
            <input
                type="url"
                name="original_url"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="https://example.com"
            >
        </div>

        <button
            type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition"
        >
            Generate Short URL
        </button>
    </form>
</div>
@endsection
