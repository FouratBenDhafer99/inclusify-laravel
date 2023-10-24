<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryEvent;

class CategoryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create example category event records
        CategoryEvent::create([
            'name' => 'Category 1',
        ]);

        CategoryEvent::create([
            'name' => 'Category 2',
        ]);

    }
}
