@extends('layouts.user')

@section('content')
<div class="container py-4">
    <h2>My Profile</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Profile Photo</label><br>
            @if ($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" class="rounded-circle mb-2" width="100" height="100">
            @else
                <img src="{{ asset('default-avatar.png') }}" class="rounded-circle mb-2" width="100" height="100">
            @endif
            <input type="file" name="profile_photo" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" value="{{ $user->address }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</div>
@endsection
