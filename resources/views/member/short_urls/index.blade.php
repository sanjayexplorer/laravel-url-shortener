@extends('layouts.app')

@section('title', 'Short URLs')

@section('content')
<div class="max-w-4xl mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Short URLs</h2>

    <ul class="space-y-4">
        @forelse($urls as $url)
            <li class="border-b pb-4">
                <a href="{{ url('/s/' . $url->short_code) }}"
                   target="_blank"
                   class="text-blue-600 hover:underline font-medium">
                    {{ url('/s/' . $url->short_code) }}
                </a>
                <p class="text-gray-600 break-words mt-1">{{ $url->original_url }}</p>
            </li>
        @empty
            <li class="text-gray-500">No short URLs found.</li>
        @endforelse
    </ul>
</div>
@endsection
