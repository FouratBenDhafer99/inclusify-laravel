<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\JobApplication;

use Faker\Factory as Faker; 

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        $numberOfApplications = 10;

        for ($i = 0; $i < $numberOfApplications; $i++) {
            JobApplication::create([
                'job_id' => 1, 
                'resume_path' => 'uploads/resumes/resume.pdf',
                'motivation' => $faker->paragraph,
                'status' => $faker->randomElement(['pending', 'accepted', 'rejected']),
                'created_by' => 1,
            ]);
        }
    }
}
