@extends('layouts.admin')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">Edit Category</div>
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent Category</label>
                <select name="parent_id" class="form-select">
                    <option value="">-- None --</option>
                    @foreach($categories as $parent)
                        <option value="{{ $parent->id }}" {{ $parent->id == $category->parent_id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if($category->image)
                    <img src="{{ asset('storage/'.$category->image) }}" width="80" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-dark">Update Category</button>
        </form>
    </div>
</div>
@endsection
