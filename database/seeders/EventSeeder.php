<?php

namespace Database\Seeders;

use App\Models\Event; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EventSeeder extends Seeder
{
    public function run()
    {
        // Create categories
        $category1 = Categories::create(['name' => 'Category A']);
        $category2 = Categories::create(['name' => 'Category B']);

        // Create organizer users
        $organizer1 = User::create([
            'name' => 'Oumaima',
            'email' => 'aze@esprit.tn',
            'password' => Hash::make('password'),
        ]);

        $organizer2 = User::create([
            'name' => 'Thouraya',
            'email' => 'gere@esprit.tn',
            'password' => Hash::make('password'),
        ]);

        // Create events
        $eventData = [
            [
                'name' => 'Event 1',
                'description' => 'Description for Event 1',
                'date' => now(),
                'location' => 'Location 1',
                'organizer_id' => $organizer1->id,
                'status' => 'UPCOMING',
                'capacity' => 100,
                'registration_deadline' => now(),
                'image' => 'event1.jpg',
                'category_id' => $category1->id,
            ],
            [
                'name' => 'Event 2',
                'description' => 'Description for Event 2',
                'date' => now(),
                'location' => 'Location 2',
                'organizer_id' => $organizer2->id,
                'status' => 'ONGOING',
                'capacity' => 150,
                'registration_deadline' => now(),
                'image' => 'event2.jpg',
                'category_id' => $category2->id,
            ],
            [
                'name' => 'Event 3',
                'description' => 'Description for Event 3',
                'date' => now(),
                'location' => 'Location 3',
                'organizer_id' => $organizer2->id,
                'status' => 'ONGOING',
                'capacity' => 170,
                'registration_deadline' => now(),
                'image' => 'event3.jpg',
                'category_id' => $category2->id,
            ],
        ];

        foreach ($eventData as $eventInfo) {
            Event::create($eventInfo);
        }
    }
}


