<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/footer.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body class="bg-gray-100">

    <nav class="navbar">
        <div class="navbar-brand">
            <a href="{{ route('aspirasi.index') }}">Aspirasi</a>
        </div>      
        <form method="POST" action="{{ route('aspirasi.logout') }}">
            @csrf
            <button type="submit" class="button-logout">
                <span class="align-middle">Log out</span>
            </button>
        </form>
    </nav>


    <main class="main-content">
        @yield('content')
    </main>

  <footer class="main-footer">
    <div class="footer-container">
        <div class="footer-info">
            <p>&copy; {{ date('Y') }} <strong>{{ config('app.name') }}</strong>. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>

</body>

</html>