@php use App\Models\Event;use App\Models\EventStatus; @endphp
<x-layout>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <div class="flex flex-col xl:flex-row">
        <div class="flex-1">
            <x-h1>
                Events
            </x-h1>
            <p class="mt-6 animate-fade-up text-center text-gray-500 [text-wrap:balance] md:text-xl"
               style="animation-delay: 0.25s; animation-fill-mode: forwards;">
                Forum 56 is continually creating events for
                students and professionals. Learn more about our upcoming events and get connected!
            </p>
        </div>
        <div x-data="{ current: true }" class="flex flex-col flex-1">
            <div class="flex flex-row justify-end">
                <button class="px-8 py-3 bg-accentDark text-white rounded-full w-60 text-center"
                        x-on:click="current = ! current"
                        x-text="current ? 'Show Past Events' : 'Show Upcoming Events'">Toggle
                    Events
                </button>
            </div>
            <div x-cloak x-show="current">
                @foreach(App\Models\Event::with('talks')->where('start_date', '>=', now())->where('status', '=',EventStatus::Published)->orderByDesc('start_date')->get() as $event)
                    <x-eventcard :event="$event"/>

                @endforeach
            </div>
            <div x-cloak x-show="!current">
                @foreach(App\Models\Event::with('talks')->where('start_date', '<', now())->where('status', '=',EventStatus::Published)->orderByDesc('start_date')->get() as $event)
                    <x-eventcard :event="$event"/>

                @endforeach
            </div>
        </div>
    </div>
</x-layout>