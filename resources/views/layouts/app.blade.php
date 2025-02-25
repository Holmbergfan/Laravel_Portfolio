<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/fixes.css') }}">
    
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    
</head>
<body>
    @include('partials.navigation')

    <main>
        @yield('content')
    </main>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>

    @vite(['resources/js/app.js'])
</body>
</html>
