@extends('layouts.admin')

@section('content')
<form method="GET" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control me-2" placeholder="Search by title..." value="{{ request('search') }}">
    <button class="btn btn-outline-secondary">Search</button>
</form>

<div class="container">
    <h2>All Schemes</h2>
    <a href="{{ route('schemes.create') }}" class="btn btn-primary mb-3">Add New Scheme</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Fee</th>
                <th>Last Date</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schemes as $scheme)
            <tr>
                <td>{{ $scheme->scheme_title }}</td>
                <td>₹{{ $scheme->applying_fee }}</td>
                <td>{{ $scheme->last_date }}</td>
                <td>{{ ucfirst($scheme->status) }}</td>
                <td>
                    @if($scheme->image)
                        <img src="{{ asset('storage/' . $scheme->image) }}" width="60">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ route('schemes.show', $scheme) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('schemes.edit', $scheme) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('schemes.destroy', $scheme) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this scheme?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">

</div>

</div>
@endsection
