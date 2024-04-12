@php use Carbon\Carbon; @endphp
@props([
    'talk',
    'isLast' => false
])

<div @class([
        "flex flex-col md:flex-row justify-between py-4",
        'border-b border-gray-light' => $isLast
        ])>
    <div class="text-left">
        <p class="text-lg">{{$talk->title}}</p>
        <p class="text-gray ">
            <x-heroicon-s-clock class="w-5 h-5 inline-block text-accentLight"/>
            {{ Carbon::parse($talk->start_time)->setTimezone('America/Chicago')->format('g:i A') }}
            -
            {{ Carbon::parse($talk->end_time)->setTimezone('America/Chicago')->format('g:i A') }}
        </p>
    </div>
    <div>
        <p>
            <x-heroicon-s-map-pin class="h-5 w-5 text-accentLight inline"/>
            {{ $talk->venue->name }}
        </p>
    </div>
</div>