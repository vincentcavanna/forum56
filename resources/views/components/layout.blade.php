@php use Illuminate\Http\Client\Request; @endphp
@props([
    'links' => [
        ['route' => '/',
        'name' => 'Home',],
        ['route' => 'about',
        'name' => 'About',],
        ['route' => 'events',
        'name' => 'Events',],
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

    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @bukStyles
</head>
<body class="antialiased" x-data="{join: false, mobileMenu: false}">
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<div class="fixed h-screen w-full bg-gradient-to-br from-indigo-50 via-white to-blue-50 -z-10"></div>

<div class="fixed top-0 w-full flex justify-center border-b border-accentMid bg-white/50 backdrop-blur-xl z-30 transition-all px-4">
    <div class="hidden md:flex mx-20 h-16 items-center justify-start w-full space-x-20">
        <a class="text-blue-950 font-display text-xl" href="/about">About Us</a>
        <a class="text-blue-950 font-display text-xl" href="/events">Events</a>
    </div>
    <div class="hidden md:flex mx-20 h-16 items-center justify-center w-full space-x-20">
        <a href="/">
            <img src="{{ asset('img/logo.png') }}" alt="Forum 56 Logo" class="h-16"/>
        </a>
    </div>
    <div class="hidden md:flex mx-20 h-16 items-center justify-end w-full space-x-20">
        <button class="font-display text-xl rounded-full bg-contrast-dark text-white p-2 px-10"
                x-on:click="join = true">Get Involved
        </button>
    </div>

    <div class="flex md:hidden h-16 items-center justify-between w-full">
        <x-logo/>
        <div class="flex flex-col justify-start items-center">
            <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false" x-on:click="mobileMenu = true">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
                <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
</div>
<div class="z-30 fixed top-0 left-0 w-full h-full flex flex-col bg-gray-light"
     x-show="mobileMenu" x-cloak>
    <div class="flex flex-row bg-background justify-between">
        <x-logo class="ml-4"/>
        <button class="h-16" x-on:click="mobileMenu = false" x-cloak>
            <x-heroicon-m-x-mark class="w-6 h-6 m-6 text-white"/>
        </button>
    </div>
    <div class="mx-10 mt-10">
        @foreach($links as $link)
            <div @class(["mx-auto mb-6 w-full border-b-2 border-contrast-dark", "border-b-4" => $link['route'] === request()->path() ])>
                <a href="{{ $link['route'] }}" @class(["text-right text-gray-dark text-2xl", "font-bold" => $link['route'] === request()->path()])>{{ $link['name'] }}</a>
            </div>
        @endforeach
        <a href="/join">
            <button class="font-display text-xl rounded-full bg-contrast-dark text-white p-2 px-10 w-full mt-6">Get
                Involved
            </button>
        </a>
    </div>
</div>
<div x-cloak class="fixed left-0 top-0 bg-black bg-opacity-50 w-screen h-screen flex justify-center items-center z-50"
     x-show="join">
    <div class="bg-white rounded shadow-md p-8 w-[90%] md:w-[60%]" @click.outside="join = false">
        <div class="flex flex-row justify-end">
            <x-heroicon-m-x-mark class="w-6 h-6 " x-on:click="join = false"/>
        </div>
        <livewire:forms.join/>
    </div>
</div>
<div class="p-4 py-10 sm:mx-20 mt-16">
    {{ $slot }}
</div>
@bukScripts
</body>
</html>
