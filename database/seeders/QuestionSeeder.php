<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'id' => 1,
                'description' => 'Question 1',
                'skill_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 2,
                'description' => 'Question 2',
                'skill_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 3,
                'description' => 'Question 3',
                'skill_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 4,
                'description' => 'Question 4',
                'skill_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 5,
                'description' => 'Question 5',
                'skill_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'description' => 'Question 6',
                'skill_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 7,
                'description' => 'Question 7',
                'skill_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 8,
                'description' => 'Question 8',
                'skill_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 9,
                'description' => 'Question 9',
                'skill_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 10,
                'description' => 'Question 10',
                'skill_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ]);
        //Question::factory(10)->create();
    }
}
