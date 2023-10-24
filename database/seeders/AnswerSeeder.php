<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([[
            'text' => 'True',
            'isCorrect' => true,
            'question_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'False',
            'isCorrect' => false,
            'question_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'Correct',
            'isCorrect' => true,
            'question_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'No',
            'isCorrect' => false,
            'question_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'No',
            'isCorrect' => false,
            'question_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'Kol',
            'isCorrect' => false,
            'question_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'Kol',
            'isCorrect' => false,
            'question_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'True',
            'isCorrect' => true,
            'question_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'True',
            'isCorrect' => true,
            'question_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'False',
            'isCorrect' => false,
            'question_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'False',
            'isCorrect' => false,
            'question_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'text' => 'True',
            'isCorrect' => true,
            'question_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ],]);
        //Answer::factory(4)->create();
    }
}
