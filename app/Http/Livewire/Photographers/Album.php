<?php

namespace App\Http\Livewire\Photographers;

use Livewire\Component;
use App\Models\Creation;

class Album extends Component
{
    public $categories = [];
    public $creations = [];
    public $value = [];

    public function all()
    {
        $this->value = [];
        $this->categories = Creation::categoryList();
        $this->creations = Creation::allCreations();
    }

    public function selectCategory($category)
    {
        $this->value = [$category];
        $this->creations = Creation::creations($this->value);
        $this->categories = Creation::categoryList();
    }

    public function mount()
    {
        $this->categories = Creation::categoryList();
        $this->creations = Creation::allCreations();
    }
    public function render()
    {
        return view('livewire.photographers.album');
    }
}
