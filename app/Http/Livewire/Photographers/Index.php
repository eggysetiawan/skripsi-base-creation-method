<?php

namespace App\Http\Livewire\Photographers;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $query = '';

    // public $photographers;
    // public $photographer;

    // public function mount()
    // {
    //     $this->photographers = User::query()
    //         ->with('roles', 'media')
    //         ->whereHas('roles', function ($query) {
    //             return $query->where('name', 'photographer');
    //         })
    //         ->where('name', 'like', "%$this->query%")
    //         ->get();
    //     $this->photographer = collect();
    // }

    public function getPhotographersProperty()
    {
        return User::query()
            ->with('roles', 'media')
            ->whereHas('roles', function ($query) {
                return $query->where('name', 'photographer');
            })
            ->where('name', 'like', "%$this->query%")
            ->get();
    }

    public function render()
    {
        return view('livewire.photographers.index', ['photographers' => $this->photographers]);
    }
}
