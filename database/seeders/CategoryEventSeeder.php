<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\CategoryEvent;

class CategoryEventSeeder extends Seeder
{
    public function run()
    {
        CategoryEvent::create([
            'name' => 'Category 1',
            'created_at' => '2023-10-02 14:00:00', 
            'updated_at' => '2023-10-02 14:30:00', 
        ]);

        CategoryEvent::create([
            'name' => 'Category 2',
            'created_at' => '2023-10-02 14:00:00', 
            'updated_at' => '2023-10-02 14:30:00',
        ]);

    }
}
