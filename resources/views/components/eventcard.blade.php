@props([
    'event',
    'talks'
])

<div class="scroll mt-2 snap-center relative col-span-1 h-[128] overflow-hidden rounded-xl border border-gray-200 shadow-md bg-white ">
    <div class="flex h-60 items-center justify-center">
        <img alt="" loading="lazy" width="2160" height="1440"
             decoding="async" data-nimg="1"
             class="w-full h-full pb-10 object-cover object-center"
             style="color: transparent;">
    </div>
    <div class="mx-auto max-w-md text-center">
        <h2 class="bg-gradient-to-br from-black to-stone-500 bg-clip-text font-display text-xl font-bold text-transparent [text-wrap:balance] md:text-3xl md:font-normal">
            {{ $event }}
        </h2>
        {{--        <div class="mt-2 leading-normal text-center text-gray-500 [text-wrap:balance] md:text-xl">--}}
        {{--            {{ $event->description }} - {{ $event->start_date }}--}}
        {{--        </div>--}}
        {{--        <div class="mt-2 mb-5 leading-normal text-center text-gray-400 [text-wrap:balance] md:text-xl">Time:--}}
        {{--            6--}}
        {{--            pm @ UD Serafy Room--}}
        {{--        </div>--}}
    </div>
</div>