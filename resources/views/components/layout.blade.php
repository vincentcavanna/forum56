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

<div class="fixed h-screen w-full bg-gradient-to-br from-indigo-50 via-white to-blue-50 -z-10"></div>

<div class="fixed top-0 w-full flex justify-center border-b border-gray bg-white/50 backdrop-blur-xl z-30 transition-all">
    <div class="mx-20 flex h-16 items-center justify-start w-full space-x-20">
        <a class="flex items-center font-display text-2xl" href="/">
            <img alt="Forum 56 Logo" loading="lazy" width="250" height="68" decoding="async" data-nimg="1"
                 class="mr-2 rounded-sm" style="color:transparent">
        </a>
        <a class="text-blue-950 font-display text-xl" href="/about">Our Story</a>
        <a class="text-blue-950 font-display text-xl" href="/our-team">Our Team</a>
        <a class="text-blue-950 font-display text-xl" href="/events">Events</a>
    </div>
</div>
<div class="p-4 py-10 sm:mx-20 mt-16">
    {{ $slot }}
</div>
@bukScripts
</body>
</html>
