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
            // ->where('username', '!=', 'seno')
            ->get();
        $capacities = [1, 2, 4, 8, 16, 32, 64, 128];

        foreach ($users as $user) {
            $criteriaHarga = Criteria::query()
                ->where('name', 'harga')
                ->first();

            Score::create([
                'user_id' => $user->id,
                'criteria_id' => $criteriaHarga->id,
                'score' => rand(100, 2000),
            ]);

            $criteriaDurasi = Criteria::query()
                ->where('name', 'durasi')
                ->first();

            Score::create([
                'user_id' => $user->id,
                'criteria_id' => $criteriaDurasi->id,
                'score' => rand(1, 12),
            ]);

            $criteriaTeknologi = Criteria::query()
                ->where('name', 'teknologi')
                ->first();

            Score::create([
                'user_id' => $user->id,
                'criteria_id' => $criteriaTeknologi->id,
                'score' => rand(1, 6),
            ]);

            $criteriaService = Criteria::query()
                ->where('name', 'service')
                ->first();

            Score::create([
                'user_id' => $user->id,
                'criteria_id' => $criteriaService->id,
                'score' => rand(1, 3),
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


            $criteriaProfesionalitas = Criteria::query()
                ->where('name', 'profesionalitas')
                ->first();

            Score::create([
                'user_id' => $user->id,
                'criteria_id' => $criteriaProfesionalitas->id,
                'score' => rand(1, 3),
            ]);
        }
    }
}
