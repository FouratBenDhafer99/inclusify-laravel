<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\CategoryEvent;
use App\Models\User;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        $categoryEvent = CategoryEvent::create([
            'id' => 1,
            'name' => 'Leader',
        ]);

        $organizer = User::create([
            'name' => 'Organizer Name',
            'email' => 'organizer@example.com',
            'password' => bcrypt('password'), // Change to the actual password
        ]);

        Event::create([
            'name' => 'Event 1',
            'description' => 'Description for Event 1',
            'date' => now(),
            'location' => 'Location 1',
            'status' => Event::STATUS_UPCOMING,
            'capacity' => 100,
            'registration_deadline' => now()->addDays(7),
            'image' => 'event_images/image1.jpg',
            'organizer_id' => $organizer->id,
            'category_id' => $categoryEvent->id,
        ]);
        
    }
}
