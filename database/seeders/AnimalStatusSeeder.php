<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\AnimalStatus;

class AnimalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AnimalStatus::factory()
        ->times(3)
        ->create();
    }
}
