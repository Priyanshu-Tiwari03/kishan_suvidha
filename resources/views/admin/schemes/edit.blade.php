@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Scheme</h2>

    <form action="{{ route('schemes.update', $schemes) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('schemes.partials.form', ['schemes' => $schemes])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
