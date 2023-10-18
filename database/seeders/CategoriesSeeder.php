<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        // Define the data for categories
        $categories = [
            ['name' => 'Category 1'],
            ['name' => 'Category 2'],
            ['name' => 'Category 3'],
            // Add more categories as needed
        ];

        // Insert the data into the 'categories' table
        Categories::insert($categories);
    }
}