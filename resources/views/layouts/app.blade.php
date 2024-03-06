<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('logo/icono_du.svg') }}" type="image/x-icon">



    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="antialiased">
    {{--  INTERFAZ DE USUARIO PARA EL ADMINISTRADOR --}}
    @if (auth()->user()->privilegio == 2 || auth()->user()->privilegio == 1)
        @include('layouts.navigation')

        <div class="p-4 sm:ml-64 dark:bg-gray-900 min-h-screen">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
                {{ $slot }}

            </div>
        </div>
    @endif

    {{-- INTERFAZ DE USUARIO PARA UNA PERSONA EN COMUN --}}
    @if (auth()->user()->privilegio == 3)
        @include('layouts.navuser')

        <section class="bg-white dark:bg-gray-900 min-h-screen">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12 ">
                <main>
                    {{ $slot }}
                </main>

            </div>
        </section>
    @endif
    </div>
    @livewireScripts
    @stack('js')
</body>

</html>
