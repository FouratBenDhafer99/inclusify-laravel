<?php

namespace Database\Seeders;

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
        CategoryEvent::create([
            'name' => 'Category 1',
        ]);

        CategoryEvent::create([
            'name' => 'Category 2',
        ]);
        
        for ($i = 3; $i <= 10; $i++) {
            CategoryEvent::create([
                'name' => "Category $i",
            ]);
        }
    }
}
