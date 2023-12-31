<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([EventSeeder::class]);
        $this->call([CategoryEventSeeder::class]);
        // JobSeeder::factory(10)->create();
        $this->call([SkillSeeder::class]);
        $this->call([QuestionSeeder::class]);
        $this->call([AnswerSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([JobSeeder::class]);
        $this->call([PostSeeder::class]);
    }
}
