@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Create New Scheme</h2>

    <form action="{{ route('schemes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('schemes.partials.form')
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
