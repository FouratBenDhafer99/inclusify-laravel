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
        DB::table('questions')->insert([[
            'description' => 'Question 1',
            'skill_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'description' => 'Question 2',
            'skill_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'description' => 'Question 3',
            'skill_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'description' => 'Question 4',
            'skill_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'description' => 'Question 5',
            'skill_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]]);
        //Question::factory(10)->create();
    }
}
