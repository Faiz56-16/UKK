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
    <div class="container">
    
        {{-- Sidebar --}}
        <aside class="sidebar">
            <h2 class="logo">Admin</h2>

            <nav class="menu">
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.aspirasi') }}"
                    class="{{ request()->routeIs('admin.aspirasi') ? 'active' : '' }}">
                    Data Aspirasi
                </a>

                <form method="POST" action="{{ route('aspirasi.logout') }}">
                    @csrf
                    <button type="submit" class="button-logout">
                        Log out
                    </button>
                </form>
            </nav>
        </aside>

        {{-- Content --}}
        <main class="content">
            <header class="navbar">
                <h1 class="page-title">
                    @yield('page-title', 'Dashboard')
                </h1>
            </header>

            @yield('content')
            
        </main>

    </div>
</body>

</html>