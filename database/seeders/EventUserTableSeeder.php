<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event; 

class EventUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get random users and events
        $users = User::inRandomOrder()->take(5)->get(); 
        $events = Event::inRandomOrder()->take(5)->get();

        // Attach users to events
        foreach ($events as $event) {
            $event->attendees()->attach($users);
        }
    }
}
