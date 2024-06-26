<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tarisland-forum - неофициальный форум по игре Tarisland">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tarisland-forum</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicons/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('img/favicons/android-chrome-512x512.png') }}">
    <link rel="apple-touch-icon" type="image/png" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" type="image/png" href="{{ asset('img/favicons/favicon-32x32.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <script defer src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script defer src="{{ asset('assets/js/count_letters.js') }}"></script>
    <script defer src="{{ asset('assets/js/textarea_count_letters.js') }}"></script>
    <script defer src="{{ asset('assets/js/textarea_resize.js') }}"></script>
    <script defer src="{{ asset('assets/js/toggle.js') }}"></script>
    <script defer src="{{ asset('assets/js/upload_check.js') }}"></script>
    @vite('resources/js/app.js')
</head>
<body>
<div id="app">
        @include('partials.header')
            <main>
                @yield('content')
            </main>
        @include('partials.footer')
</div>
</body>
</html>
