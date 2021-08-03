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
            'Berapa budget untuk menggunakan jasa photography anda?',
            'Berapa lama waktu yang diberikan untuk jasa photography anda?',
            'Merek/jenis kamera dan seri apa yang anda gunakan ?',
            'Pelayanan apa saja yang anda berikan ?',
            'Anda menggunakan memory kamera apa dan berapa gigabyte(GB)?',
            'Sudah berapa lama anda menggeluti bidang fotografi ini ?',
        ];

        foreach ($questions as $question) {
            Question::create([
                'question' => $question,
            ]);
        }
    }
}
