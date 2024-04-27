<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Profile;

class Join extends Component
{
    public $first_name = '';

    public $last_name = '';

    public $gender = '';

    public $email = '';

    public $linkedin = '';

    public $interests = '';

    public $phone = '';

    public $genderOpts = [
        ['value' => 'male', 'label' => 'Male'],
        ['value' => 'female', 'label' => 'Female'],
    ];

    public function save()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:profiles',
            'phone' => 'required',
        ]);

        $profile = Profile::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'email' => $this->email,
            'linkedin' => $this->linkedin,
            'interests' => $this->interests,
            'phone' => $this->phone,
        ]);

        $profile->save();
    }

    public function render()
    {
        return view('livewire.forms.join');
    }
}
