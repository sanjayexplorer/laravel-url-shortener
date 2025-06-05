@extends('layouts.app')

@section('title', 'All Short URLs')

@section('content')
<h2>All Short URLs (SuperAdmin)</h2>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Original URL</th>
            <th>Short Code</th>
            <th>Created By (User)</th>
            <th>Company</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shortUrls as $url)
        <tr>
            <td><a href="{{ $url->original_url }}" target="_blank">{{ $url->original_url }}</a></td>
            <td><a href="{{ url('/s/' . $url->short_code) }}" target="_blank">{{ $url->short_code }}</a></td>
            <td>{{ $url->user->name }}</td>
            <td>{{ $url->user->company->name ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
