<?php 

use Illuminate\Database\Seeder;
use App\Models\Event; 

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'name' => 'Event 1',
            'description' => 'Description for Event 1',
            'date' => '2023-10-15',
            'location' => 'Location for Event 1',
            'organizer' => 'Organizer for Event 1',
            'status' => 'UPCOMING',
            'capacity' => 100,
            'registration_deadline' => '2023-10-10',
            'image' => 'event1.jpg',
        ]);

        Event::create([
            'name' => 'Event 2',
            'description' => 'Description for Event 2',
            'date' => '2023-11-20',
            'location' => 'Location for Event 2',
            'organizer' => 'Organizer for Event 2',
            'status' => 'ONGOING',
            'capacity' => 150,
            'registration_deadline' => '2023-11-15',
            'image' => 'event2.jpg',
        ]);

        
        for ($i = 3; $i <= 10; $i++) {
            Event::create([
                'name' => "Event $i",
                'description' => "Description for Event $i",
                'date' => now()->addDays($i),
                'location' => "Location for Event $i",
                'organizer' => "Organizer for Event $i",
                'status' => 'UPCOMING', 
                'capacity' => rand(50, 200), 
                'registration_deadline' => now()->addDays($i - 5),
                'image' => "event$i.jpg",
            ]);
        }
    }
}
