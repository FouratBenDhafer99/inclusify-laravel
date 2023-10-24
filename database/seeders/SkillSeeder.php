<?php

namespace Database\Seeders;

use App\Models\Skill;
use Database\Factories\SkillFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            [
                'id' => 1,
                'name' => 'JavaScript',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 2,
                'name' => 'Java',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 3,
                'name' => 'React',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'PHP',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 5,
                'name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'id' => 6,
                'name' => 'Angular',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
        //Skill::factory(5)->create();
    }
}
