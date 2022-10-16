<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        \App\Models\User::factory(15)->create();
        \App\Models\Category::factory(17)->create();
        \App\Models\Channel::factory(17)->create();
        \App\Models\Situation::factory(12)->create();
        \App\Models\Course::factory(12)->create();
        \App\Models\Lead::factory(100)->create();
        \App\Models\Type::factory(13)->create();
        \App\Models\Modality::factory(13)->create();
        \App\Models\Student::factory(24)->create();
        \App\Models\Teacher::factory(20)->create();
        \App\Models\Semester::factory(13)->create();
        \App\Models\Group::factory(5)->create();

    }
}
