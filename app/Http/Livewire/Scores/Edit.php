<?php

namespace App\Http\Livewire\Scores;

use App\Models\Score;
use Livewire\Component;

class Edit extends Component
{
    public $user;

    public $scores;
    public $score;

    public $capacity;
    public $duration;
    public $professionality;
    public $rate;
    public $service;
    public $technology;

    public function mount()
    {
        $this->scores = Score::query()
            ->with('criteria')
            ->whereHas('criteria')
            ->where('user_id', $this->user->id)
            ->get();

        // dd($this->scores[0]->score);

        $this->score = collect();
        $this->capacity = $this->scores[0]->score;
        $this->duration = $this->scores[1]->score;
        $this->professionality = $this->scores[2]->score;
        $this->rate = $this->scores[3]->score;
        $this->service = $this->scores[4]->score;
        $this->technology = $this->scores[5]->score;
    }
    public function render()
    {
        return view('livewire.scores.edit');
    }
}
