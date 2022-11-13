<?php

namespace Database\Factories;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
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
            'type' => fake()->randomElement(['STANDARD', 'DUPLEX', 'DELUX']),
            'price' => fake()->randomFloat(2, 10 ,1000),
            'bed_type' => fake()->randomElement(['SINGLE', 'DOUBLE', 'KING', 'QUEEN']),
            'bed_count' => fake()->numberBetween(1, 3),
            'furniture' => fake()->randomElements(['CUPBOARD', 'TABLE', 'CHAIR', 'SOFA'], 2 , false),
            'balcony' => fake()->boolean(),
            'services' => fake()->randomElements(['SPA', 'POOL', 'GOLF'], 2 , false),
            'complimentaries' => fake()->randomElements(['BREAKFAST', 'SNACKS', 'DRINKS'], 2 , false),
            'floor_id' => Floor::factory()
        ];
    }
}
