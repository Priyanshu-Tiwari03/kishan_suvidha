@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Categories</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-dark">Add new category</a>
</div>


<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        Category List
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Parent ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->parent_id ?? 'N/A' }}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ asset('storage/'.$category->image) }}" width="50" height="50" alt="Category Image">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-dark btn-sm mb-1">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            <a href="{{ url('/categories/export/excel') }}" class="btn btn-success">Export to Excel</a>
            <a href="{{ url('/categories/export/csv') }}" class="btn btn-primary">Export to CSV</a>
            <a href="{{ url('/categories/export/pdf') }}" class="btn btn-danger">Export to PDF</a>
        </div>
    </div>
</div>
@endsection
