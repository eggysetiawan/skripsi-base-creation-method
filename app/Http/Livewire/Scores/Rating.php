<?php

namespace App\Http\Livewire\Scores;

use App\Models\Criteria;
use Livewire\Component;

class Rating extends Component
{
    public $user;

    public $criterias;
    public $criteria;

    public $capacity;
    public $duration;
    public $professionality;
    public $rate;
    public $service;
    public $technology;

    public function mount()
    {
        $this->criterias = Criteria::all();
        $this->criteria = collect();

        $this->capacity = 0;
        $this->duration = 0;
        $this->professionality = 0;
        $this->rate = 0;
        $this->service = 0;
        $this->technology = 0;
    }

    public function render()
    {
        return view('livewire.scores.rating');
    }
}
