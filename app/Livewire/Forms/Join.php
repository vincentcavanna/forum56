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

    public $graduation_year = '';

    public $studies = '';

    public $linkedin = '';

    public $interests = '';

    public $prefix = '';

    public $genderOpts = [
        ['value' => 'male', 'label' => 'Male'],
        ['value' => 'female', 'label' => 'Female'],
    ];

    public $prefixOpts = [
        ['value' => '', 'label' => 'No Prefix'],
        ['value' => 'Mr.', 'label' => 'Mr.'],
        ['value' => 'Ms.', 'label' => 'Ms.'],
        ['value' => 'Dr.', 'label' => 'Dr.'],
        ['value' => 'Prof.', 'label' => 'Prof.'],
    ];

    public function save()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:profiles',
            'graduation_year' => 'required',
            'studies' => 'required',
        ]);

        $profile = Profile::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'email' => $this->email,
            'linkedin' => $this->linkedin,
            'studies' => $this->studies,
            'interests' => $this->interests,
            'graduation_year' => $this->graduation_year,
            'prefix' => $this->prefix
        ]);

        $profile->save();

        $this->redirect('/join');
    }

    public function render()
    {
        return view('livewire.forms.join');
    }
}
