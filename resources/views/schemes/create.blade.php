@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="text-center mb-4">Create New Scheme</h2>

            <form action="{{ route('schemes.store') }}" method="POST" class="card p-4 shadow-sm">
                @csrf

                <div class="form-group mb-3">
                    <label for="scheme_title" class="form-label">Title</label>
                    <input type="text" name="scheme_title" id="scheme_title" class="form-control" placeholder="Enter Scheme Title">
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter Scheme Description"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" name="image" id="image" class="form-control" placeholder="Paste Image URL">
                </div>

                <div class="form-group mb-3">
                    <label for="applying_fee" class="form-label">Applying Fee</label>
                    <input type="number" name="applying_fee" id="applying_fee" class="form-control" step="0.01" placeholder="Enter Applying Fee">
                </div>

                <div class="form-group mb-3">
                    <label for="last_date" class="form-label">Last Date</label>
                    <input type="date" name="last_date" id="last_date" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input type="url" name="url" id="url" class="form-control" placeholder="Enter Application URL">
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" name="status" value="1" checked class="form-check-input" id="status">
                    <label for="status" class="form-check-label">Active</label>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('schemes.index') }}" class="btn btn-secondary">Back to List</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
