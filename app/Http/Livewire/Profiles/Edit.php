<?php

namespace App\Http\Livewire\Profiles;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $user,
        $brand,
        $username,
        $first_name,
        $last_name,
        $email,
        $mobile,
        $bio;

    protected $validate;


    public function requiredField($field)
    {
        if (!$this->$field) {
            return $this->addError($field, 'The ' . $field . ' field is required');
        }
    }

    public function mount()
    {
        $this->brand = $this->user->brand;
        $this->username = $this->user->username;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->mobile = $this->user->mobile;
        $this->bio = $this->user->bio;

        $this->requiredField('brand');
        $this->requiredField('username');
        $this->requiredField('mobile');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'brand' => ['required', 'min:3'],
            'username' => ['min:8', 'required', 'alpha_dash'],
            'first_name' => ['min:3', 'alpha', 'required'],
            'last_name' => ['nullable', 'alpha'],
            'email' => ['email', Rule::unique('users')->ignore($this->user->id, 'id'), 'required'],
            'mobile' => ['digits_between:9,13', 'required', 'min:9', 'max:13'],
            'bio' => ['nullable'],
        ]);
    }

    // public function editProfile()
    // {
    //     auth()->user()->update([
    //         'brand' => $this->brand,
    //         'username' => $this->username,
    //         'first_name' => $this->first_name,
    //         'last_name' => $this->last_name,
    //         'email' => $this->email,
    //         'mobile' => $this->mobile,
    //         'bio' => $this->bio,
    //     ]);

    //     return redirect()->route('home');
    // }

    public function render()
    {
        $user = User::where('id', $this->user)->first();
        return view('livewire.profiles.edit', compact('user'));
    }
}
