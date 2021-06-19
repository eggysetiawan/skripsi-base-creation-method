<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            'Sejak kapan anda sudah mengeluti bidang fotografi?',
            'Berapa budget untuk menggunakan jasa anda?',
            'Dan berapa lama untuk budget segitu?',
            'Kamera apa yang anda gunakan?',
            'Selain kamera, alat apa saja yang anda punya/biasa gunakana?',
            'Hal apa yang membuat mengeluti dunia fotografi?',
            'sudah berapa banyak terlibat dalam acara?',
        ];

        foreach ($questions as $question) {
            Question::create([
                'question' => $question,
            ]);
        }
    }
}
