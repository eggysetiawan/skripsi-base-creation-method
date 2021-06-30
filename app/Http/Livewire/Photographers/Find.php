<?php

namespace App\Http\Livewire\Photographers;

use App\Models\Criteria;
use Livewire\Component;

class Find extends Component
{
    public $criterias;
    public $criteria;

    public $capacity;
    public $duration;
    public $professionality;
    public $rate;
    public $service;
    public $technology;

    public bool $table;

    public function mount()
    {
        $this->capacity = 0;
        $this->duration = 0;
        $this->professionality = 0;
        $this->rate = 0;
        $this->service = 0;
        $this->technology = 0;

        $this->table = false;
    }
    public function render()
    {
        return view('livewire.photographers.find');
    }
}
