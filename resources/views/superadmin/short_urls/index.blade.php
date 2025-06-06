@extends('layouts.app')

@section('title', 'All Short URLs')

@section('content')
<div class="max-w-6xl bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">All Short URLs (SuperAdmin)</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Original URL</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Short Code</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Created By (User)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Company</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($shortUrls as $url)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-blue-600">
                        <a href="{{ $url->original_url }}" target="_blank" class="hover:underline break-all">
                            {{ $url->original_url }}
                        </a>
                    </td>
                    <td class="px-6 py-4 text-green-600">
                        <a href="{{ url('/s/' . $url->short_code) }}" target="_blank" class="hover:underline">
                            {{ $url->short_code }}
                        </a>
                    </td>
                    <td class="px-6 py-4 text-gray-700">{{ $url->user->name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $url->user->company->name ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
