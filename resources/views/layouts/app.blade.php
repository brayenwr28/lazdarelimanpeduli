<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laz Dareliman Peduli</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/logo/logobru.jpeg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

</body>
</html>