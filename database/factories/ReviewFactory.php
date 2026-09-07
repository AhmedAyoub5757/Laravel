<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'reviewer_name'=>$this->faker->name(),
            'rating'=>$this->faker->numberBeteen(1, 5),
            'comment'=>$this->faker->sentence(),
        ];
    }
}
