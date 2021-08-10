<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CriteriaSeeder::class,
            CreationSeeder::class,
            QuestionSeeder::class,
            QuestionnaireSeeder::class,
            ScoreSeeder::class
        ]);
    }
}
