<?php

namespace App\Http\Livewire\Criterias\Create;

use Livewire\Component;

class Score extends Component
{
    public $score;

    public function mount()
    {
        $this->score = 0;
    }
    public function render()
    {
        return view('livewire.criterias.create.score');
    }
}
