<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DiabeticApp - @yield('titulo')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    </head>
    <body class="bg-gray-100">
        <header class="bg-white border-b border-gray-200 shadow-lg md:flex md:justify-around md:items-center py-3">
            <h1 class="text-indigo-500 font-normal text-3xl text-center mt-5 md:text-left md:mt-0">Diabetic<span class="font-bold text-3xl">App</span> </h1>
            <p class="text-center mt-3 md:mt-0 md:text-left font-semibold text-xl text-indigo-500" id="year"></p>

        </header>
        <main>
            @yield('contenido')
        </main>
        <div class="print:hidden -mt-20">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#6366f1" fill-opacity="1" d="M0,288L48,282.7C96,277,192,267,288,266.7C384,267,480,277,576,261.3C672,245,768,203,864,181.3C960,160,1056,160,1152,170.7C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
              </svg>
        </div>
        <footer class="bg-indigo-500 pb-5 print:hidden">
            <p class="text-center text-white md:text-2xl">Diabetic<span class="font-bold ">App</span> - Todos los derechos reservados &copy; - {{ now()->year }}</p>
        </footer>

    </body>
</html>
