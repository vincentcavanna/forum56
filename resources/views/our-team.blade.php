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
        <x-h1>Our Team</x-h1>
    </div>
    <div class="my-10 grid w-full animate-fade-up grid-cols-1 gap-5 px-5 md:grid-cols-2 lg:grid-cols-3 xl:px-0">
        @foreach($members as $member)
            <x-team-card :name="$member['name']" :position="$member['position']" :image="$member['image']"
                         :linkedin="$member['linkedin']"/>
        @endforeach
    </div>
</x-layout>