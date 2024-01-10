<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--Boot-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--TinyMCE-->
    <script src="https://cdn.tiny.cloud/1/wv1fn2twdcvkgylhwwioa2aeculpr6fpnygyjrvuudr391fo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script defer src="{{ asset('js/toggle.js') }}"></script>
    <script defer src="{{ asset('js/countLetters.js') }}"></script>
    <script defer src="{{ asset('js/uploadCheck.js') }}"></script>
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