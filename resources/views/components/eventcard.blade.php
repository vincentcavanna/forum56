@php use Carbon\Carbon; @endphp
@props([
    'event',
    'talks'
])

<div class="scroll mt-12 relative overflow-visible rounded-xl border border-1 border-accentLight shadow-md bg-white px-4">
    <x-date-display :start-date="$event->start_date" :end-date="$event->end_date" class="items-start"/>
    <h2 class="w-full bg-gradient-to-br from-black to-stone-500 bg-clip-text font-display text-xl font-bold text-transparent md:text-3xl md:font-normal text-nowrap">
        {{ $event->title }}
    </h2>
    <div class="mx-auto w-full text-center">
        <div class="mt-2 leading-normal text-center text-gray md:text-xl mx-6">
            {{ $event->description }}
        </div>
        @foreach( $event->talks as $talk )
            @if($loop->last)
                <x-talk-display :talk="$talk"/>
            @else
                <x-talk-display :talk="$talk" :is-last="true"/>
            @endif
        @endforeach
    </div>
</div>