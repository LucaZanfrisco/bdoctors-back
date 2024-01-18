<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body class="bg-light">
<div id="app">
    <nav class="navbar-login">
        @guest
            <ul class="list-unstyled mb-0">
                <li>
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/doctor') }}">
                        <div class="logo-guest">
                            <i class="fa-solid fa-stethoscope"></i>
                            B-Doctor
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url("/login") }}">Accedi</a>
                    <a href="{{ url("/register") }}">Registrati</a>
                </li>
            </ul>
        @endguest
    </nav>

    <main>
        @yield('content')
    </main>
</div>
</body>

</html>
