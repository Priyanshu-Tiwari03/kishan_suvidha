<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration Page</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light">
        <section class="p-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <h4 class="fw-bold">Register Here</h4>
                                </div>
                                <form action="{{ route('account.processRegister') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-3">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name">
                                                <label for="name">Name</label>
                                                @error('name')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
                                                <label for="email">Email</label>
                                                @error('email')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                                <label for="password">Password</label>
                                                @error('password')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                                <label for="password_confirmation">Confirm Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone Number">
                                                <label for="phone">Phone Number</label>
                                                @error('phone')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Address">
                                                <label for="address">Address</label>
                                                @error('address')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="state" id="state" placeholder="State">
                                                <label for="state">State</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="district" id="district" placeholder="District">
                                                <label for="district">District</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">User Type</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="user_type" id="farmer" value="Farmer">
                                                    <label class="form-check-label" for="farmer">Farmer</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="user_type" id="customer" value="Customer">
                                                    <label class="form-check-label" for="customer">Customer</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="user_type" id="service_provider" value="Service Provider">
                                                    <label class="form-check-label" for="service_provider">Service Provider</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('aadhaar_number') is-invalid @enderror" name="aadhaar_number" id="aadhaar_number" placeholder="Aadhaar Number">
                                                <label for="aadhaar_number">Aadhaar Number (Optional)</label>
                                                @error('aadhaar_number')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('referral_code') is-invalid @enderror" name="referral_code" id="referral_code" placeholder="Referral Code">
                                                <label for="referral_code">Referral Code (Optional)</label>
                                                @error('referral_code')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="profile_photo" class="form-label">Profile Photo</label>
                                            <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" name="profile_photo" id="profile_photo" accept="image/*">
                                            @error('profile_photo')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Register Now</button>
                                        </div>
                                    </div>
                                </form>
                                <hr class="my-4">
                                <div class="text-center">
                                    <a href="{{ route('account.login') }}" class="link-primary">Already have an account? Login here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
