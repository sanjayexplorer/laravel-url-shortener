@extends('layouts.app')

@section('title', 'Member Dashboard')

@section('content')
    <h1>Welcome Member</h1>
    <p><a href="{{ route('member.short-urls.index') }}">View Short URLs</a></p>
    <p><a href="{{ route('member.short-urls.create') }}">Create Short URL</a></p>
@endsection
