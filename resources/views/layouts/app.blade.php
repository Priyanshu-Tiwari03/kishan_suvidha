<!DOCTYPE html>
<html>
<head>
    <title>Kishaan Suvidha Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">Kishaan Suvidha</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('schemes.index') }}">Schemes</a></li>
            </ul>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
