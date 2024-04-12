@php use Carbon\Carbon; @endphp
@props([
    'startDate',
    'endDate',
    ])

<legend class="-mt-4 ml-6 animate-fade-up bg-white text-center font-display text-2xl font-bold tracking-[-0.02em] text-primary [text-wrap:balance] md:text-5xl md:leading-[5rem] md:-mt-10">
    {{ Carbon::parse($startDate)->monthName }}
    {{ Carbon::parse($startDate)->day }}
    @if( !Carbon::parse($startDate)->isSameDay(Carbon::parse($endDate)))
        -
        {{ Carbon::parse($endDate) ->monthName }}
        {{ Carbon::parse($endDate)->day }}
    @endif
</legend>