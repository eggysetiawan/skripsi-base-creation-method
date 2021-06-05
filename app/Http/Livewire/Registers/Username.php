<?php

namespace App\Http\Livewire\Registers;

use Livewire\Component;

class Username extends Component
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;


    public function requiredField($field)
    {
        if (!$this->$field) {
            return $this->addError($field, 'The ' . $field . ' field is required.');
        }
    }

    public function mount()
    {

        $this->username = old('username');
        $this->email = old('email');

        $this->requiredField('username');
        $this->requiredField('email');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'username' => ['min:5', 'required', 'string', 'alpha_dash', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'alpha_num', 'confirmed'],
        ]);
    }


    public function render()
    {
        return view('livewire.registers.username');
    }
}
