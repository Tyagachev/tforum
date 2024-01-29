<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tarisland-forum</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--Boot-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script defer src="{{ asset('js/toggle.js') }}"></script>
    <!--<script defer src="{{ asset('js/countLetters.js') }}"></script>-->
    <script defer src="{{ asset('js/uploadCheck.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.4.15/vue.global.prod.min.js" integrity="sha512-Q4NoO9rQA70dtLz1DDYH/6paYbJG+Gu8qvGiUDelLKjR2NJH01uUaZd6jwJ/jlDr0WGaw9a+ShIhR3v98MspQg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.5/axios.js"></script>
</head>
<body>
    <div id="app">
            @include('partials.header')
            <main>
                <div id="app_vue">
                @yield('content')
                </div>
            </main>
            @include('partials.footer')
    </div>
</body>
<script>
    //import axios from 'axios';
    const { createApp } = Vue;
    createApp({
        data() {
            return {
                info: [],
                url: null
            };
        },
        mounted() {
            this.getUrl()
        },
        methods: {
            getUrl() {
                this.url = new URL(location.href);
                this.getData()
                console.log(this.url)

            },
            getData() {
                axios.get(this.url + '/api').then(res => {
                    this.info = res.data
                    console.log(this.info)
                })
            }
        }
    }).mount('#app_vue')
</script>
</html>
