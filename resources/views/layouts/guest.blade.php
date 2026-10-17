<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pixel Community') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-800 antialiased bg-slate-50 min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden" style="font-family: 'Inter', sans-serif;">
        <!-- Ambient Background Mesh -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-70 pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-cyan-100 rounded-full blur-3xl opacity-70 pointer-events-none"></div>

        <div class="relative z-10 w-full max-w-md">
            <div class="text-center mb-6">
                <a href="/" class="inline-block transition-transform hover:scale-105">
                    <x-application-logo />
                </a>
            </div>

            <div class="w-full bg-white px-8 py-8 shadow-xl shadow-slate-200/50 border border-slate-100 rounded-2xl">
                {{ $slot }}
            </div>

            <div class="text-center mt-6">
                <a href="/" class="text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </div>
    </body>
</html>
