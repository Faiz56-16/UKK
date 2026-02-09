<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<div class="container-fluid">
    <div class="row min-vh-100">

        <!-- Sidebar -->
        <aside class="col-12 col-md-3 col-lg-2 bg-primary text-white p-3">
            <h4 class="text-center mb-4">Admin</h4>

            <div class="d-grid gap-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="btn btn-light {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.aspirasi') }}"
                   class="btn btn-light {{ request()->routeIs('admin.aspirasi') ? 'active' : '' }}">
                    Data Aspirasi
                </a>

                <form method="POST" action="{{ route('aspirasi.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-success mt-3">
                        Log out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Content -->
        <main class="col-12 col-md-9 col-lg-10 p-4 bg-light">
            <h1 class="mb-4">@yield('page-title', 'Dashboard')</h1>

            @yield('content')
        </main>

    </div>
</div>
</body>


</html>