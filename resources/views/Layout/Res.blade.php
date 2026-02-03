<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/navbar.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body class="bg-gray-100">

<nav class="navbar">
    <div class="navbar-brand">
        <a href="{{ route('aspirasi.index') }}">Aspirasi</a>
    </div>  
</nav>


    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>
