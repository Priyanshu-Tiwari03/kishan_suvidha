<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">User Management</h3>
    </div>
    <div class="container">
      <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
          <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card border-0 shadow-lg my-4">
            <div class="card-header bg-dark">
              <h3 class="text-white">Edit User</h3>
            </div>
            <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
              @method('put')
              @csrf
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label h5">Profile Photo</label>
                  <input type="file" class="form-control form-control-lg" name="profile_photo">
                  @if($user->profile_photo)
                  <div class="mt-2">
                    <img width="100" src="{{ asset('uploads/profile/' . $user->profile_photo) }}" alt="Profile Photo">
                  </div>
                  @endif
                </div>
                
                <div class="mb-3">
                  <label class="form-label h5">Name</label>
                  <input value="{{ old('name', $user->name) }}" type="text" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name" name="name">
                  @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label h5">Email</label>
                  <input value="{{ old('email', $user->email) }}" type="email" class="@error('email') is-invalid @enderror form-control form-control-lg" placeholder="Email" name="email">
                  @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label h5">Phone Number</label>
                  <input value="{{ old('phone', $user->phone) }}" type="text" class="@error('phone') is-invalid @enderror form-control form-control-lg" placeholder="Phone Number" name="phone">
                  @error('phone')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label h5">Address</label>
                  <textarea class="@error('address') is-invalid @enderror form-control form-control-lg" placeholder="Address" name="address">{{ old('address', $user->address) }}</textarea>
                  @error('address')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label h5">User Type</label>
                  <select class="form-control form-control-lg" name="type">
                    <option value="customer" {{ $user->type == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="vendor" {{ $user->type == 'vendor' ? 'selected' : '' }}>Vendor</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label h5">Referral Code</label>
                  <input value="{{ old('referral_code', $user->referral_code) }}" type="text" class="@error('referral_code') is-invalid @enderror form-control form-control-lg" placeholder="Referral Code" name="referral_code">
                  @error('referral_code')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label h5">Aadhaar Card Number</label>
                  <input value="{{ old('aadhaar', $user->aadhaar) }}" type="text" class="@error('aadhaar') is-invalid @enderror form-control form-control-lg" placeholder="Aadhaar Card Number" name="aadhaar">
                  @error('aadhaar')
                    <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-3">
                  <label class="form-label h5">New Password (leave blank if not changing)</label>
                  <input type="password" class="form-control form-control-lg" placeholder="New Password" name="password">
                </div>

                <div class="mb-3">
                  <label class="form-label h5">Confirm Password</label>
                  <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="password_confirmation">
                </div>

                <div class="mb-3">
                  <label class="form-label h5">Role</label>
                  <select class="form-control form-control-lg" name="role">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                  </select>
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </body>
</html>
