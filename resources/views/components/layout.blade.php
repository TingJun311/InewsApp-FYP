<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Favicon --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon_io/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon_io/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon_io/avicon-16x16.png') }}">
        {{-- <link rel="manifest" href="{{ asset('images/favison_io/site.webmanifest') }}"> --}}

        {{-- Bootstrap 5.2 --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- Css link --}}
        <link rel="stylesheet" href="{{ asset('css/main.css') }}"> {{-- For NavBar, Footer, SideBar and RightNavBar --}}

        @livewireStyles
    </head>
    <body>
        <main>
            {{ $slot }}
        </main>
        {{-- Bootstrap js CDN  --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="{{ asset("js/main.js") }}"></script>
        @livewireScripts
    </body>
</html>
