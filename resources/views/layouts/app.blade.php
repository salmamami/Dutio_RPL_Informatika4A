<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DUTIO</title>

    {{-- Bootstrap 5 (layout grid, utilities) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">

    {{-- Tema custom DUTIO --}}
    <link rel="stylesheet" href="{{ asset('css/dutio.css') }}">

    @yield('styles')
    @stack('styles')
</head>

<body>

<div class="dutio-app">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Backdrop untuk mobile --}}
    <div class="dutio-sidebar-backdrop" id="dutioSidebarBackdrop"></div>

    <div class="dutio-main">

        {{-- Topbar --}}
        @include('layouts.navbar')

        {{-- Konten halaman --}}
        <div class="dutio-content">
            @yield('content')
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Toggle sidebar (desktop: collapse, mobile: slide-in overlay)
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.dutio-sidebar');
        const backdrop = document.getElementById('dutioSidebarBackdrop');
        const toggleBtn = document.getElementById('dutioSidebarToggle');

        function isMobile() {
            return window.innerWidth <= 768;
        }

        toggleBtn?.addEventListener('click', function () {
            if (isMobile()) {
                sidebar.classList.toggle('is-open');
                backdrop.classList.toggle('is-visible');
            } else {
                sidebar.classList.toggle('is-collapsed');
            }
        });

        backdrop?.addEventListener('click', function () {
            sidebar.classList.remove('is-open');
            backdrop.classList.remove('is-visible');
        });
    });
</script>

@yield('scripts')

</body>
</html>
