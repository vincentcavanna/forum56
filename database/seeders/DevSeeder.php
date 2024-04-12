<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Talk;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::factory()->create([
//            'name' => 'Vincent Cavanna',
//            'email' => 'vcavanna@wordonfire.org',
//            'password' => bcrypt('pass'),
//        ]);

        Talk::factory(3)->for(Event::factory())->for(Venue::factory())->create([
            
        ]);
    }
}
