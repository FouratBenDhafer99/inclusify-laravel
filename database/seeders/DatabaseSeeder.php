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
        $this->call([SkillSeeder::class]);
        $this->call([QuestionSeeder::class]);
        $this->call([AnswerSeeder::class]);
        $this->call([EventSeeder::class]);
        $this->call([CategoriesSeeder::class]);
        $this->call([EventUserTableSeeder::class]);
    }
}
