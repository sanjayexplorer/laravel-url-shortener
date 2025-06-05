@extends('layouts.app')

@section('title', 'Create Short URL')

@section('content')
    <h2>Create New Short URL</h2>
    <form method="POST" action="{{ route('member.short-urls.store') }}">
        @csrf
        <label>Original URL:</label>
        <input type="url" name="original_url" required><br>
        <button type="submit">Generate Short URL</button>
    </form>
@endsection
