<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
       return [
            'name' => $this->faker->firstName() . ' the ' . $this->faker->randomElement(['Brave', 'Swift', 'Cursed', 'Ancient']),
            'class' => $this->faker->randomElement(['Warrior', 'Mage', 'Archer', 'Rogue', 'Healer']),
            'level' => $this->faker->numberBetween(1, 99),
            'health_points' => $this->faker->numberBetween(50, 1000),
            'is_boss' => $this->faker->boolean(10), // 10% chance of being true
        ];
    }
}
