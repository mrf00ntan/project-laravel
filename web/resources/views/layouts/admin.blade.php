<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Panel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('bower_components/foundation-sites/dist/css/foundation.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="top-bar">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                        <a href="/admin/dashboard">
                            Admin Panel
                        </a>
                    </li>
                    <li>
                        <a href="#">Новости</a>
                        <ul class="menu vertical">
                            <li>
                                <a href="@if(Route::is('news_show')) # @else {{route('news_show')}} @endif">Просмотр</a>
                                <a href="@if(Route::is('news_add')) # @else {{route('news_add')}} @endif">Добавить</a>
                                <a href="news/remove">Удалить</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/what-input/dist/what-input.min.js') }}"></script>
    <script src="{{ asset('bower_components/foundation-sites/dist/js/foundation.min.js') }}"></script>
    <script>
        $(document).foundation();
    </script>
    <script src="{{ asset('js/admin/app.js') }}"></script>
</body>
</html>
