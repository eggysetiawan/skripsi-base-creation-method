<?php

namespace App\Http\Livewire\Registers;

use Livewire\Component;

class Password extends Component
{
    public $password;

    public function requiredField($field)
    {
        if (!$this->$field) {
            return $this->addError($field, 'The ' . $field . ' field is required.');
        }
    }

    public function mount()
    {
        $this->requiredField('password');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'password' => ['required', 'string', 'min:8', 'alpha_num', 'confirmed'],
        ]);
    }
    public function render()
    {
        return view('livewire.registers.password');
    }
}
