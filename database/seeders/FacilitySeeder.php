<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managers = User::factory(5)->create();

        Facility::factory(15)
            ->state(new Sequence(
                fn ($sequence) => ['manager_id' => $managers->random()],
            ))
            ->create();
    }
}
