<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Score;
use App\Models\User;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()
            ->with('roles', 'media')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->where('username', '!=', 'seno')
            ->get();
        $capacities = [1, 2, 4, 8, 16, 32, 64, 128, 256, 512, 1024];

        foreach ($users as $user) {
            $criteriaHarga = Criteria::query()
                ->where('name', 'harga')
                ->first();

            Score::create([
                'user_id' => $user->id,
                'criteria_id' => $criteriaHarga->id,
                'score' => rand(100, 2000),
            ]);

            $randCapacity = array_rand($capacities);
            $criteriaCapacity = Criteria::query()
                ->where('name', 'capacity')
                ->first();

            Score::create([
                'user_id' => $user->id,
                'criteria_id' => $criteriaCapacity->id,
                'score' => $capacities[$randCapacity],
            ]);

            $criteriasExceptHargaAndCapacity = Criteria::query()
                ->whereNotIn('name', ['harga', 'capacity'])
                ->get();

            foreach ($criteriasExceptHargaAndCapacity as $criteria) {
                $randomScore = rand(1, 15);
                Score::create([
                    'user_id' => $user->id,
                    'criteria_id' => $criteria->id,
                    'score' => $randomScore,
                ]);
            }
        }
    }
}
