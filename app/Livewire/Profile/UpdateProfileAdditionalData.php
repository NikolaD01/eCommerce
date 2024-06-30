<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\Attributes\Validate;
class UpdateProfileAdditionalData extends Component
{
    #[Validate('required|string|max:255')]
    public $city;

    #[Validate('required|string|max:255')]
    public $region;

    #[Validate('required|string|max:255')]
    public $address;

    #[Validate('required|string|max:10')]
    public $post_code;

    #[Validate('required|string|max:15')]
    public $phone_number;


    public function render()
    {
        return view('livewire.profile.update-profile-additional-data');
    }
}
