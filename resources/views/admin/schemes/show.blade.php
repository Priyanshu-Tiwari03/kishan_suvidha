@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>{{ $schemes->scheme_title }}</h2>
    <p><strong>Description:</strong> {{ $schemes->description }}</p>
    <p><strong>Fee:</strong> ₹{{ $schemes->applying_fee }}</p>
    <p><strong>Last Date:</strong> {{ $schemes->last_date }}</p>
    <p><strong>Status:</strong> {{ ucfirst($schemes->status) }}</p>
    <p><strong>URL:</strong> <a href="{{ $schemes->url }}" target="_blank">{{ $schemes->url }}</a></p>

    @if($schemes->image)
        <img src="{{ asset('storage/' . $schemes->image) }}" width="200">
    @endif

    <br><br>
    <a href="{{ route('schemes.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
