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
        DB::table('answers')->insert([
            [
            'id' => 1,
            'text' => 'True',
            'isCorrect' => true,
            'question_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ],[
                'id' => 13,
                'text' => 'True',
                'isCorrect' => true,
                'question_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 14,
                'text' => 'False',
                'isCorrect' => false,
                'question_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 15,
                'text' => 'Correct',
                'isCorrect' => true,
                'question_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 16,
                'text' => 'No',
                'isCorrect' => false,
                'question_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 17,
                'text' => 'No',
                'isCorrect' => false,
                'question_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 18,
                'text' => 'Kol',
                'isCorrect' => false,
                'question_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 19,
                'text' => 'Kol',
                'isCorrect' => false,
                'question_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 20,
                'text' => 'True',
                'isCorrect' => true,
                'question_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 21,
                'text' => 'True',
                'isCorrect' => true,
                'question_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 22,
                'text' => 'False',
                'isCorrect' => false,
                'question_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 23,
                'text' => 'False',
                'isCorrect' => false,
                'question_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'id' => 24,
                'text' => 'True',
                'isCorrect' => true,
                'question_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ]);
        //Answer::factory(4)->create();
    }
}
