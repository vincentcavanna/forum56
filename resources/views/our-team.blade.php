@props([
    'members' => [
        [
            'name' => 'Joe Dunikoski',
            'position' => 'Co-founder & Executive Director',
            'image' => 'joe-dunikoski.png',
            'linkedin' => 'https://www.linkedin.com/in/joseph-dunikoski/',
        ],
        [
            'name' => 'JP Rezendes',
            'position' => 'Co-founder & Director of Operations',
            'image' => 'joe-dunikoski.png',
            'linkedin' => 'https://www.linkedin.com/in/jprezendes/',
        ],
        [
            'name' => 'Joseph Moynihan',
            'position' => 'Co-founder & Director of Technology',
            'image' => 'joe-dunikoski.png',
            'linkedin' => 'https://www.linkedin.com/in/joseph-moynihan-0586051b9/',
        ],
        [
            'name' => 'Molly Zepeda',
            'position' => 'Co-founder',
            'image' => 'joe-dunikoski.png',
            'linkedin' => 'https://www.linkedin.com/in/mollyzepeda1/',
        ],
        [
            'name' => 'Luke Posegate',
            'position' => 'Co-founder & Director of Communications',
            'image' => 'joe-dunikoski.png',
            'linkedin' => 'https://www.linkedin.com/in/luke-posegate/',
        ],
        [
            'name' => 'Vincent Cavanna',
            'position' => 'Director of Technology',
            'image' => 'joe-dunikoski.png',
            'linkedin' => 'https://www.linkedin.com/in/vincent-cavanna/',
        ],
    ]
])

<x-layout>
    <div class="z-10 w-full px-5 xl:px-0">
        <h1
                class="animate-fade-up bg-gradient-to-br from-blue-950 to-blue-700 bg-clip-text text-center font-display text-4xl font-bold tracking-[-0.02em] text-transparent drop-shadow-sm [text-wrap:balance] md:text-7xl md:leading-[5rem]"
                style="animation-delay: 0.15s; animation-fill-mode: forwards;">Our Team</h1>
    </div>
    <div class="my-10 grid w-full animate-fade-up grid-cols-1 gap-5 px-5 md:grid-cols-2 lg:grid-cols-3 xl:px-0">
        @foreach($members as $member)
            <x-team-card :name="$member['name']" :position="$member['position']" :image="$member['image']"
                         :linkedin="$member['linkedin']"/>
        @endforeach
    </div>
</x-layout>