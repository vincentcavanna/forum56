<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Profile;

class Join extends Component
{
    #[Validate('required')]
    public $first_name = '';

    #[Validate('required')]
    public $last_name = '';

    #[Validate('required')]
    public $gender = '';

    #[Validate('required', 'email', 'unique')]
    public $email = '';

    #[Validate('required')]
    public $graduation_year = '';

    #[Validate('required')]
    public $studies = '';

    public $linkedin = '';

    public $interests = '';

    public $prefix = '';

    public $genderOpts = [
        ['value' => 'male', 'label' => 'Male'],
        ['value' => 'female', 'label' => 'Female'],
    ];

    public $prefixOpts = [
        ['value' => 'Mr.', 'label' => 'Mr.'],
        ['value' => 'Ms.', 'label' => 'Ms.'],
        ['value' => 'Dr.', 'label' => 'Dr.'],
        ['value' => 'Prof.', 'label' => 'Prof.'],
        ['value' => '', 'label' => 'Prefix'],
    ];

    public function save()
    {
        $this->validate();

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
