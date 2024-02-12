<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.css') }}" media="screen,projection"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>
<body>
    <nav>
        <ul>
            <a class="waves-effect waves-light btn" href="{{ route('post-its.index') }}">Post-It</a>
            <a class="waves-effect waves-light btn" href="{{ route('tasks.index') }}">Tareas</a>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
</body>
</html>
