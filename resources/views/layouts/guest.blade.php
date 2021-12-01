<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
               <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://cdn.britannica.com/92/216092-131-5FF4D1E7/custom-library.jpg');">
     </div></main>
    </body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    
</html>
