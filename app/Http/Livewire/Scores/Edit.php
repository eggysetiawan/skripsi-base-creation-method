<?php

namespace App\Http\Livewire\Scores;

use App\Models\Score;
use Livewire\Component;

class Edit extends Component
{
    public $user;

    public $scores;
    public $score;

    public $harga;
    public $durasi;
    public $teknologi;
    public $service;
    public $capacity;
    public $profesionalitas;

    public function mount()
    {
        $this->scores = Score::query()
            ->with('criteria')
            ->whereHas('criteria')
            ->where('user_id', $this->user->id)
            ->get();

        // dd($this->scores[0]->score);

        $this->score = collect();

        $this->harga = $this->scores[0]->score;
        $this->durasi = $this->scores[1]->score;
        $this->teknologi = $this->scores[2]->score;
        $this->service = $this->scores[3]->score;
        $this->capacity = $this->scores[4]->score;
        $this->profesionalitas = $this->scores[5]->score;
    }
    public function render()
    {
        return view('livewire.scores.edit');
    }
}
