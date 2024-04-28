@php use Illuminate\Support\Facades\Storage; @endphp
@props([
    'members' => [
        [
            'name' => 'Joe Dunikoski',
            'position' => 'Co-founder & Executive Director',
            'image' => 'jDunikowski.jpeg',
            'linkedin' => 'https://www.linkedin.com/in/joseph-dunikoski/',
        ],
        [
            'name' => 'JP Rezendes',
            'position' => 'Co-founder & Director of Operations',
            'image' => 'jpRezendes.jpeg',
            'linkedin' => 'https://www.linkedin.com/in/jprezendes/',
        ],
        [
            'name' => 'Joseph Moynihan',
            'position' => 'Co-founder & Director of Technology',
            'image' => 'jMoynihan.jpeg',
            'linkedin' => 'https://www.linkedin.com/in/joseph-moynihan-0586051b9/',
        ],
        [
            'name' => 'Molly Zepeda',
            'position' => 'Co-founder',
            'image' => 'mZepeda.jpg',
            'linkedin' => 'https://www.linkedin.com/in/mollyzepeda1/',
        ],
        [
            'name' => 'Luke Posegate',
            'position' => 'Co-founder & Director of Communications',
            'image' => 'lPosegate.jpeg',
            'linkedin' => 'https://www.linkedin.com/in/luke-posegate/',
        ],
        [
            'name' => 'Vincent Cavanna',
            'position' => 'Website & Design',
            'image' => 'vincentC.jpg',
            'linkedin' => 'https://www.linkedin.com/in/vincent-cavanna/',
        ],
    ]
])

<x-layout>
    <div>
        <x-h1>Our Story</x-h1>
        <p class="mt-6 animate-fade-up text-center text-gray-500 [text-wrap:balance] md:text-xl"
           style="animation-delay: 0.25s; animation-fill-mode: forwards;">At Forum 56, we realize that many students in
            2024 go through their college years without realizing what opportunities await them in the professional
            world. Founded and managed by students at the University of Dallas, Forum 56 launched in January 2024.</p>
    </div>
    <div class="mt-16 z-10 w-full px-5 xl:px-0">
        <h2 class="animate-fade-up bg-gradient-to-br from-blue-950 to-blue-700 bg-clip-text text-center font-display text-3xl font-bold tracking-[-0.02em] text-transparent drop-shadow-sm [text-wrap:balance] md:text-6xl md:leading-[5rem]">
            Our Team</h2>
    </div>
    <div class="my-10 grid w-full animate-fade-up grid-cols-1 gap-5 px-5 md:grid-cols-2 lg:grid-cols-3 xl:px-0">
        @foreach($members as $member)
            <x-team-card :name="$member['name']" :position="$member['position']"
                         :image="asset('img/' . $member['image'])"
                         :linkedin="$member['linkedin']"/>
        @endforeach
    </div>
</x-layout>
