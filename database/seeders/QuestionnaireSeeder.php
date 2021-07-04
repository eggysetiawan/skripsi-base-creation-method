<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestionnaireSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $users = User::photographers();

        foreach ($users as $user) {
            $questions = Question::get();

            foreach ($questions as $question) {
                $user->questionnaires()->create([
                    'question_id' => $question->id,
                    'answer' => $faker->sentence(3),
                ]);
            }
        }
    }
}
