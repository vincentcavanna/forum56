@php use App\Models\Event; @endphp
<x-layout>
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
        <div class="flex flex-col flex-1">
            @foreach(App\Models\Event::with('talks')->get() as $event)
                <x-eventcard :event="$event"/>

            @endforeach
        </div>
    </div>
</x-layout>