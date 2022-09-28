<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Course;
use App\Models\Situation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'course_id' => Course::all()->random(),
            'user_id' => User::all()->random(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'situation_id' => Situation::all()->random(),
            'channel_id' => Channel::all()->random(),
            'description' => fake()->sentence(5)
        ];
    }
}
