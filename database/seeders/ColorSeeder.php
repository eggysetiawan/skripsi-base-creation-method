<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $photographers = User::query()
            ->with('roles', 'media')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->get();

        foreach ($photographers as $photographer) {
            Color::create([
                'photographer_id' => $photographer->id,
                'name' => $faker->safeHexColor,
            ]);
        }
    }
}
