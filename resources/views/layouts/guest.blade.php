<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Outfit', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
        <style type="text/tailwindcss">
            @layer utilities {
                .glass {
                    @apply bg-white/70 dark:bg-gray-900/70 backdrop-blur-xl border border-white/30 dark:border-gray-700/30 shadow-2xl;
                }
            }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="h-full bg-slate-50 dark:bg-gray-950 text-gray-900 antialiased font-sans overflow-x-hidden">
        <div class="fixed inset-0 z-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('auth_background.png') }}'); opacity: 0.6;">
            <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/20 via-transparent to-purple-500/20 backdrop-blur-[2px]"></div>
        </div>


        <div class="relative z-10 min-h-screen flex flex-col sm:justify-center items-center p-6 bg-transparent">
            <div class="mb-8 transform hover:scale-105 transition-transform duration-300">
                <a href="/" class="flex flex-col items-center">
                    <div class="p-3 rounded-2xl bg-white/50 dark:bg-gray-800/50 backdrop-blur-md shadow-xl border border-white/50 dark:border-gray-700/50 mb-4">
                        <x-application-logo class="w-16 h-16 fill-current text-indigo-600" />
                    </div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                        {{ config('app.name', 'Taskly') }}
                    </h1>
                </a>
            </div>

            <div class="w-full sm:max-w-md glass overflow-hidden sm:rounded-3xl p-8 transform transition-all duration-500">
                {{ $slot }}
            </div>

            
            <footer class="mt-8 text-sm text-gray-500/80 dark:text-gray-400/80">
                &copy; {{ date('Y') }} {{ config('app.name', 'Taskly') }}. All rights reserved.
            </footer>
        </div>
    </body>
</html>


