<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Job::create([
            'title' => 'Software Developer',
            'description' => 'Join our team as a software developer.',
            'salaryRange' => '$60,000 - $80,000',
            'company' => 'TechCo',
            'address' => '123 Main St',
        ]);
    }
}
