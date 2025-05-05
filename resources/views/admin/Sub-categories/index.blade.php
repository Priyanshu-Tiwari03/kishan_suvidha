@extends('layouts.admin') {{-- Layout file --}}

@section('content')
<div class="container">
    <h2>Subcategories</h2>

    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>Subcategory List</strong>
            <a href="{{ route('admin.Sub-categories.create') }}" class="btn btn-dark">Add New Subcategory</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->category->name ?? 'N/A' }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->description }}</td>
                            <td>{{ $subcategory->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('admin.Sub-categories.edit', $subcategory->id) }}" class="btn btn-sm btn-dark">Edit</a>
                                <form action="{{ route('admin.Sub-categories.destroy', $subcategory->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ url('/sub_categories/export/excel') }}" class="btn btn-success">TO EXCEL</a>
            <a href="{{ url('/sub_categories/export/csv') }}" class="btn btn-primary">TO CSV</a>
            <a href="{{ url('/sub_categories/export/pdf') }}" class="btn btn-danger">TO PDF</a>

          
        </div>
    </div>
</div>
@endsection
