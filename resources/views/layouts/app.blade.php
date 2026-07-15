<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laz Dareliman Peduli</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/logo/logobru.jpeg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AOS Animate On Scroll (Global) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @stack('styles')
</head>
<body>

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <!-- AOS Init (Global) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ once: true, offset: 50, duration: 800 });</script>
    @stack('scripts')
</body>
</html>