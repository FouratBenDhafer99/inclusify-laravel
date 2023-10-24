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
        DB::table('skills')->insert([[
            'name' => 'JavaScript',
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'name' => 'Java',
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'name' => 'React',
            'created_at' => now(),
            'updated_at' => now()
        ]]);
        //Skill::factory(5)->create();
    }
}
