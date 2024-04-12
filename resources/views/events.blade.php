@php use App\Models\Event; @endphp
<x-layout>
    <div class="flex flex-col xl:flex-row">
        <div class="flex-1">
            <h1 class="animate-fade-up bg-gradient-to-br from-blue-950 to-blue-700 bg-clip-text text-center font-display text-4xl font-bold tracking-[-0.02em] text-transparent drop-shadow-sm [text-wrap:balance] md:text-7xl md:leading-[5rem]">
                Events
            </h1>
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