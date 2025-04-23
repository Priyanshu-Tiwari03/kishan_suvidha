<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KS-LOGIN</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card border border-light-subtle rounded-4">
                    <div class="row g-0">
                        <!-- Left Side Image -->
                        <div class="col-md-6 d-none d-md-block">
                        <img src="{{ asset('img/login-image.jpg') }}" class="img-fluid h-100 w-100 rounded-start" alt="Login Image">

                        </div>
                        <!-- Right Side Form -->
                        <div class="col-md-6">
                            <div class="card-body p-4">
                                <h4 class="text-center mb-4">Login Here</h4>
                                <form action="{{ route('account.authenticate') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com">
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary py-2" type="submit">Log in now</button>
                                    </div>
                                </form>
                                <hr class="mt-4 border-secondary-subtle">
                                <div class="text-center">

                                    <a href="{{ route('account.register') }}" class="link-secondary text-decoration-none">Create new account</a>
                                </div>
                            </div>
                        </div> <!-- End of Right Side Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
