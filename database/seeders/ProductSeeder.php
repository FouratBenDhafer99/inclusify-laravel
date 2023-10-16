<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::factory()->count(5)->create();

        // Product::create([
        //     'name' => 'Product 1',
        //     'description' => 'This is a product description.',
        //     'quantity' => 10,
        //     'price' => 29.99,
        //     'image' => 'sample_product1.jpg',
        //     'user_id' => 1,
        // ]);

        // Product::create([
        //     'name' => 'Product 2',
        //     'description' => 'Another product description.',
        //     'quantity' => 5,
        //     'price' => 19.99,
        //     'image' => 'product2.jpg',
        //     'user_id' => 1,
        // ]);
    }
}
