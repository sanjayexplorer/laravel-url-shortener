@extends('layouts.app')

@section('title', 'Company Short URLs')

@section('content')
<div class="max-w-5xl mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Short URLs (Company-Wide)</h2>

    <ul class="space-y-4">
        @foreach($urls as $url)
            <li class="border border-gray-200 rounded-md p-4 bg-gray-50 hover:bg-gray-100 transition">
                <a href="{{ url('/s/'.$url->short_code) }}"
                   target="_blank"
                   class="text-blue-600 hover:underline font-medium">
                    {{ url('/s/'.$url->short_code) }}
                </a>
                <div class="text-gray-600 text-sm mt-1 truncate">
                    {{ $url->original_url }}
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
