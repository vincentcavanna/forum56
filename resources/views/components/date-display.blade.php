@php use Carbon\Carbon; @endphp
@props([
    'startDate',
    'endDate',
    ])

<legend class="mt-4animate-fade-up bg-white text-left font-display text-2xl font-bold tracking-[-0.02em] text-primary [text-wrap:balance] md:text-5xl md:leading-[5rem]">
    {{ $startDate->monthName }}
    {{ $startDate->day }}
    @if( !$startDate->isSameDay($endDate))
        -
        {{ $endDate ->monthName }}
        {{ $endDate->day }}
    @endif
</legend>