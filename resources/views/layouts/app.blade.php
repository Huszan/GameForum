<!DOCTYPE html>
<html lang='en'>
    <!-- "{{ app()->getLocale() }}" POTENCIAL -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is a Game Forum">
    <meta name="keywords" content="Forum, Games, Gamer, Website, php, laravel, fun, black, life, matters">
    <meta name="author" content="Mateusz Jacenty, Jakub Jurycz, Łukasz Kichman">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GameForum') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.config.language='en';
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
