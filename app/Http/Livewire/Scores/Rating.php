<?php

namespace App\Http\Livewire\Scores;

use App\Models\Criteria;
use Livewire\Component;

class Rating extends Component
{
    public $user;

    public $criterias;
    public $criteria;

    public $harga;
    public $durasi;
    public $teknologi;
    public $service;
    public $capacity;
    public $profesionalitas;

    public function mount()
    {
        $this->criterias = Criteria::all();
        $this->criteria = collect();

        $this->harga = 0;
        $this->durasi = 0;
        $this->teknologi = 0;
        $this->service = 0;
        $this->capacity = 0;
        $this->profesionalitas = 0;
    }

    public function render()
    {
        return view('livewire.scores.rating');
    }
}
