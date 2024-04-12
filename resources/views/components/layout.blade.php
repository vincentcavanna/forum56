@props([
    'links' => [
        ['route' => '/',
        'name' => 'Home',],
        ['route' => '/about',
        'name' => 'About',],
        ['route' => '/events',
        'name' => 'Events',],
        ['route' => '/our-team',
        'name' => 'Our Team',],
]
])

        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forum 56</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @bukStyles
</head>
<body class="antialiased">
<div class="flex flex-row justify-between sm:hidden">
    <x-logo/>
    <x-dropdown class="text-gray-500">
        <div class="flex flex-col gap-2">
            <x-slot name="trigger">
                <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </x-slot>
            @foreach($links as $link)
                <a href="{{ $link['route'] }}" class="text-right">{{ $link['name'] }}</a>
            @endforeach
        </div>
    </x-dropdown>
</div>

<aside id="default-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
       aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-background">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/"
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-heroicon-c-home class="h-5 w-5"></x-heroicon-c-home>
                    <span class="ms-3">Home</span>
                </a>
            </li>
            <li>
                <a href="/about"
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-heroicon-c-question-mark-circle class="h-5 w-5"/>
                    <span class="flex-1 ms-3 whitespace-nowrap">About</span>
                </a>
            </li>
            <li>
                <a href="/our-team"
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-heroicon-c-user-group class="h-5 w-5"/>
                    <span class="flex-1 ms-3 whitespace-nowrap">Our Team</span>
                </a>
            </li>
            <li>
                <a href="/events"
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-heroicon-c-calendar-days class="h-5 w-5"/>
                    <span class="flex-1 ms-3 whitespace-nowrap">Events</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<div class="p-4 sm:ml-64">
    {{ $slot }}
</div>
@bukScripts
</body>
</html>
