@extends('layouts.admin')

@section('content')
    <style>
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color:rgb(253, 245, 245);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="url"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="url"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            border-color:rgb(1, 1, 2);
            outline: none;
        }
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-check input[type="checkbox"] {
            margin-right: 10px;
            width: 18px;
            height: 18px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
            display: inline-block;
            text-align: center;
        }
        .btn-primary {
            background-color:rgb(16, 21, 24);
            color: white;
        }
        .btn-primary:hover {
            background-color:rgb(16, 21, 24 );
        }
        .btn-secondary {
            background-color:rgb(8, 10, 10);
            color: white;
        }
        .btn-secondary:hover {
            background-color:rgb(39, 51, 61);
        }
    </style>

    <div class="form-container">
        <h2>Edit Scheme</h2>

        <form action="{{ route('schemes.update', $schemes->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="scheme_title">Scheme Title</label>
                <input type="text" id="scheme_title" name="scheme_title" value="{{ old('scheme_title', $schemes->scheme_title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="3" required>{{ old('description', $schemes->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="apply_link">Apply Link</label>
                <input type="url" id="apply_link" name="apply_link" value="{{ old('apply_link', $schemes->apply_link) }}" required>
            </div>

            <div class="form-group">
                <label for="applying_fee">Applying Fee</label>
                <input type="number" id="applying_fee" name="applying_fee" value="{{ old('applying_fee', $schemes->applying_fee) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="last_date">Last Date</label>
                <input type="date" id="last_date" name="last_date" value="{{ old('last_date', $schemes->last_date) }}" required>
            </div>

            <div class="form-group">
                <label for="url">More Info URL</label>
                <input type="url" id="url" name="url" value="{{ old('url', $schemes->url) }}" required>
            </div>

            <div class="form-check">
                <input type="checkbox" id="status" name="status" {{ old('status', $schemes->status) ? 'checked' : '' }}>
                <label for="status">Status (Active)</label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('schemes.index') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
@endsection
