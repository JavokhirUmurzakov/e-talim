<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Akkreditatsiya>
 */
class AkkreditatsiyaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomi' => $this->faker->name(),
            'haqida' => $this->faker->sentence(20),
            'sana' => $this->faker->dateTime,
            'pdf' => $this->faker->text(10),
            'ohtm_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
