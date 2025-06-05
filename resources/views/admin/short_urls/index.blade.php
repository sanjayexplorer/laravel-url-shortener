@extends('layouts.app')

@section('title', 'Company Short URLs')

@section('content')
    <h2>Short URLs (Company-Wide)</h2>
    <ul>
        @foreach($urls as $url)
            <li>
                <a href="{{ url('/s/'.$url->short_code) }}" target="_blank">{{ url('/s/'.$url->short_code) }}</a>
                — {{ $url->original_url }}
            </li>
        @endforeach
    </ul>
@endsection
