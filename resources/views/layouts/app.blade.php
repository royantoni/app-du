<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Scripts -->
   
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="antialiased">
    {{--  INTERFAZ DE USUARIO PARA EL ADMINISTRADOR --}}
    @if (auth()->user()->privilegio == 2)
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
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
