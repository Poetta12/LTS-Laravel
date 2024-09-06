<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class cartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween(1, 10),
            'ref' => $this->faker->numberBetween(1, 1000),
            //
        ];
    }
}
