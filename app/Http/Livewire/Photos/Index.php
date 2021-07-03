<?php

namespace App\Http\Livewire\Photos;

use App\Models\Creation;
use Livewire\Component;

class Index extends Component
{
    public $categories = [];
    public $creations = [];
    public $value = [];

    public function all()
    {
        $this->value = [];
        $this->categories = Creation::globalCategory();
        $this->creations = Creation::globalCreations();
    }

    public function selectCategory($category)
    {
        $this->value = [$category];
        $this->creations = Creation::categoryCreations($this->value);
        $this->categories = Creation::globalCategory();
    }

    public function mount()
    {
        $this->categories = Creation::globalCategory();
        $this->creations = Creation::globalCreations();
    }

    public function render()
    {
        return view('livewire.photos.index');
    }
}
