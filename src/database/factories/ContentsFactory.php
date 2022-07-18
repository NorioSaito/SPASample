<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contents>
 */
class ContentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(rand(15, 40)),
            'detail' => $this->faker->realText(100),
            'created_by' => 'laravel',
            'created_at' => now(),
            'updated_by' => 'laravel',
            'updated_at' => now()
        ];
    }
}
