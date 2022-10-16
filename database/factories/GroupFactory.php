<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Modality;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'capacity' => rand(30,70),
            'teacher_id' => Teacher::all()->random(),
            'semester_id' => Semester::all()->random(),
            'course_id' => Course::all()->random(),
            'type_id' => Type::all()->random(),
            'modality_id' => Modality::all()->random()
        ];
    }
}
