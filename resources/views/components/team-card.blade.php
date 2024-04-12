@props([
    'name',
    'position',
    'image',
    'linkedin',
])

<a href="{{ $linkedin }}" target="_blank" rel="noreferrer">
    <div class="relative col-span-1 h-96 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-md ">
        <div class="flex h-60 items-center justify-center">
            <img alt="{{ $name }} Profile Pic" loading="lazy"
                 width="170" height="170" decoding="async"
                 data-nimg="1"
                 class="object-cover object-center rounded-full"
                 style="color: transparent;"
                 src="{{ $image }}">
        </div>
        <div class="mx-auto max-w-md text-center">
            <h2 class="bg-gradient-to-br from-black to-stone-500 bg-clip-text font-display text-xl font-bold text-transparent [text-wrap:balance] md:text-3xl md:font-normal">
                {{ $name }}
            </h2>
            <div class="prose-sm mt-3 leading-normal text-gray-500 [text-wrap:balance] md:prose">
                <p>
                    {{ $position }}
                </p>
            </div>
        </div>
    </div>
</a>