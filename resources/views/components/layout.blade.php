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
        
        <script src="https://kit.fontawesome.com/a076d05399.js" defer></script>

        {{-- ionic.io icon --}}
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        {{-- Font awesome --}}
        <script src="https://kit.fontawesome.com/5002f56ce6.js" crossorigin="anonymous"></script>
        <title>Inews</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- Css link --}}
        <link rel="stylesheet" href="{{ asset('css/main.css') }}"> {{-- For NavBar, Footer, SideBar and RightNavBar --}}
        <link rel="stylesheet" href="{{ asset('css/loading.css') }}">

        {{-- Alpine JS  --}}
        <script src="//unpkg.com/alpinejs" defer></script>

        {{-- Animation CDN --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        
        @livewireStyles
    </head>
    <body>
        <main>
            {{ $slot }}
        </main>
        {{-- Bootstrap js CDN  --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        @livewireScripts
        <script src="{{ asset("js/main.js") }}" defer></script>
    </body>
</html>
