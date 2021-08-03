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
        $criterias = ['harga', 'durasi', 'teknologi', 'service', 'capacity', 'profesionalitas'];
        $max = [2000, 12, 6, 3, 128, 3];
        $benefit = [0, 0, 1, 1, 1, 1];

        $i = 0;
        foreach ($criterias as $criteria) {
            Criteria::create([
                'slug' => Str::slug($criteria),
                'name' => $criteria,
                'max' => $max[$i],
                'is_benefical' => $benefit[$i],
            ]);
            $i++;
        }
    }
}
