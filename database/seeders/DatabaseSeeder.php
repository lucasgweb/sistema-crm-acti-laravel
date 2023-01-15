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
    public function run(){

     $user = \App\Models\User::factory()->create([
        'name' => 'Lucas Godoy',
        'email' => 'test@example.com',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ]);

        $this->call([
            PermissionSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ChannelSeeder::class,
            SituationSeeder::class,
            CourseSeeder::class,
            LeadSeeder::class,
            TypeSeeder::class,
            ModalitySeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            SemesterSeeder::class,
            GroupSeeder::class
        ]);

        $user->givePermissionTo('Administrador');
    }
};
