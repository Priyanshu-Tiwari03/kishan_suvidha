@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.Sub-categories.update', $subCategory->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="category_id">Select Category</label>
        <select name="category_id" class="form-select">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="name">Sub Category Name</label>
        <input type="text" name="name" class="form-control" value="{{ $subCategory->name }}" required />
    </div>

    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" class="form-control">{{ $subCategory->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>Current Image</label><br>
        @if($subCategory->image)
            <img src="{{ asset('uploads/sub_categories/' . $subCategory->image) }}" width="80">
        @else
            <p>No Image</p>
        @endif
    </div>

    <div class="mb-3">
        <label for="image">Change Image</label>
        <input type="file" name="image" class="form-control" />
    </div>

    <button type="submit" class="btn btn-dark">Update Sub Category</button>
</form>
@endsection