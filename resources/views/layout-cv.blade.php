
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV Portfolio - UTS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f3f6fb; }
        .navbar { background: #142d4e; }
        .card { border: none; border-radius: 15px; }
        .btn { border-radius: 8px; }
        .profile-img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark py-3">
        <div class="container">
            <a href="{{ route('biodata.index') }}"
               class="navbar-brand fw-bold">
                My CV Portfolio
            </a>
            <a href="{{ route('biodata.index') }}"
               class="btn btn-outline-light btn-sm">
                Kelola Biodata
            </a>
        </div>
    </nav>

    <main class="container py-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
