<?php

namespace App\Http\Livewire\Criterias\Edit;

use Livewire\Component;

class Score extends Component
{
    public $criteria;
    public $score;

    public function mount()
    {
        $this->score = $this->criteria->score;
    }

    public function render()
    {
        return view('livewire.criterias.edit.score');
    }
}
