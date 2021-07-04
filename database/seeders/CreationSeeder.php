<?php

namespace Database\Seeders;

use App\Models\Creation;
use Illuminate\Database\Seeder;

class CreationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Creation::factory()->count(5)->create();
    }
}
