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
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 grid auto-cols-[min-content_1fr] auto-rows-[min-content_min-content_1fr]">
@include('layouts.navigation')

<!-- Page Heading -->
    <header class="bg-white shadow col-span-2 grid-rows-2">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex flex-row justify-between">
            {{ $header }}
            {{ $buttons ?? '' }}
        </div>
    </header>

    <!-- Page Side nav -->
    <aside class="bg-white col-span-1 grid-rows-2 px-6 pt-4 bg-slate-700">
        <x-admin.nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Dashboard</x-admin.nav-link>
        <x-admin.nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Users</x-admin.nav-link>
        <x-admin.nav-link href="{{ route('admin.clients.index') }}" :active="request()->routeIs('admin.clients.index')">Clients</x-admin.nav-link>
        <x-admin.nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Projects</x-admin.nav-link>
        <x-admin.nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Tasks</x-admin.nav-link>
    </aside>

    <!-- Page Content -->
    <main class="col-span-1 grid-rows-2">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-admin.flash/>
</div>
</body>
</html>
