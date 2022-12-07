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
            'type' => fake()->randomElement(['standard', 'duplex', 'delux']),
            'price' => fake()->randomFloat(2, 10, 1000),
            'bed_type' => fake()->randomElement(['single', 'double', 'king', 'queen']),
            'bed_count' => fake()->numberBetween(1, 3),
            'furniture' => fake()->randomElements(['cupboard', 'table', 'chair', 'sofa'], 2, false),
            'balcony' => fake()->boolean(),
            'services' => fake()->randomElements(['spa', 'pool', 'golf'], 2, false),
            'complimentaries' => fake()->randomElements(['breakfast', 'snacks', 'drinks'], 2, false),
            'floor_id' => Floor::factory()
        ];
    }
}
