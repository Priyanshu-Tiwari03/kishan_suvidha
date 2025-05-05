@extends('layouts.admin')

@section('content')
<style>
    table {
        width: 60%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
        text-align: left;
    }
    a.btn {
        display: inline-block;
        padding: 8px 16px;
        margin-top: 15px;
        margin-right: 10px;
        text-decoration: none;
        border-radius: 5px;
        color: white;
    }
    .btn-primary {
        background-color: #3498db;
    }
    .btn-secondary {
        background-color: #7f8c8d;
    }
</style>
<h2>{{ $schemes->scheme_title }}</h2>

<table class="table">
    <tr>
            <th>Title</th>
            <td>{{ $schemes->scheme_title }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $schemes->description }}</td>
        </tr>
        <tr>
            <th>Applying Fee</th>
            <td>{{ $schemes->applying_fee }}</td>
        </tr>
        <tr>
            <th>Last Date</th>
            <td>{{ $schemes->last_date }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $schemes->status ? 'Active' : 'Inactive' }}</td>
        </tr>
    </table>

    <a href="{{ $schemes->url }}" class="btn btn-primary mt-3">More Info</a>
    <a href="{{ route('schemes.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
