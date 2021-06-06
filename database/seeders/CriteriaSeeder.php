<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterias = ['capacitiy', 'duration', 'professionality', 'rate', 'service', 'technology'];

        foreach ($criterias as $criteria) {
            Criteria::create([
                'slug' => Str::slug($criteria),
                'name' => $criteria
            ]);
        }
    }
}
