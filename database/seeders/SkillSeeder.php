<?php

namespace Database\Seeders;

use App\Models\Skill;
use Database\Factories\SkillFactory;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('skill')->insert([
            'name' => 'JavaScript',
        ]);*/
        Skill::factory(5)->create();
    }
}
