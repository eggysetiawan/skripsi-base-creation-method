<?php

namespace App\Http\Livewire\Registers;

use App\Models\User;
use Livewire\Component;

class Username extends Component
{
    public $role;
    public $first_name;
    public $last_name;
    public $username;
    public $mobile;
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
        $this->requiredField('username');
        $this->requiredField('email');
        $this->role = 'photographer';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'role' => ['required', 'string', 'in:customer,photographer'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'min:5',  'alpha_dash', 'string', 'max:12'],
            'mobile' => ['required', 'digits_between:9,13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register()
    {
        $last_name =  ' ' . $this->last_name ?? null;
        $name = $this->first_name . $last_name;
        $users = User::create([
            'name' => $name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'mobile' => $this->mobile,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $users->assignRole($this->role);

        session()->flash('success', 'Akun telah berhasil di daftarkan! Login untuk masuk ke aplikasi.');

        return redirect()->route('login');
    }


    public function render()
    {
        return view('livewire.registers.username');
    }
}
