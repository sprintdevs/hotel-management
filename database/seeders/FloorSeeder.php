<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Floor;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facility = Facility::factory(5)->create();

        Floor::factory(15)
            ->state(new Sequence(
                fn ($sequence) => ['facility_id' => $facility->random()],
            ))
            ->create();
    }
}
