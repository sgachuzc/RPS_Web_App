<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory {
    
    public function definition(): array {
        return [
            'name' => $this->faker->word,
            'subtitle' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'type' => fake()->randomElement(['Curso','Auditoría']),
            'featured' => $this->faker->boolean,
            'user_id' => 1
        ];
    }
}
