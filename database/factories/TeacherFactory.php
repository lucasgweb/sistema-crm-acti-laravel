<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'document' => rand(1000000,2000000),
            'email' => fake()->safeEmail,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'course_id' => Course::all()->random(),
            'remuneration' => fake()->randomFloat('2','20','100')
        ];
    }
}
