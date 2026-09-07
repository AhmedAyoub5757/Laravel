<?php

namespace Database\Factories;
use App\Models\School;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = School::class;

    public function definition(): array
{
    return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'class_name' => $this->faker->randomElement(['9', '10', '11', '12']),
        'is_enrolled' => $this->faker->boolean(90),
    ];
}
}
