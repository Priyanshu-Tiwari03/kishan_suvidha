@extends('layouts.admin')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">Create Category</div>
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent Category</label>
                <select name="parent_id" class="form-select">
                    <option value="">-- None --</option>
                    @foreach($categories as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>
            
    </select>
</div>


            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-dark">Save Category</button>
        </form>
    </div>
</div>
@endsection
