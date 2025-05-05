<!-- resources/views/admin/subcategories/create.blade.php -->

@extends('layouts.admin')<!-- Ya jo bhi layout file tu use kar raha ho -->

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Create Sub Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.Sub-categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Category Select -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Parent Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Sub Category Name -->
                <div class="mb-3">
                    <label class="form-label">Sub Category Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-control"></textarea>
                </div>

                <!-- Submit -->
                <div class="card-footer bg-dark text-center">
                    <button type="submit" class="btn btn-light">Save Sub Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection