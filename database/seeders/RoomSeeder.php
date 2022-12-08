<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floor = Floor::factory(5)->create();

        Room::factory(15)
            ->state(new Sequence(
                fn ($sequence) => ['floor_id' => $floor->random()],
            ))
            ->create();
    }
}
