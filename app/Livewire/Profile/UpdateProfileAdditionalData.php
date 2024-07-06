<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;


use App\Services\User\UserDataService;
use Livewire\Component;
use Livewire\Attributes\Validate;
use \Illuminate\Contracts\View\View;
class UpdateProfileAdditionalData extends Component
{

    #[Validate('required')]
    public $user;
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

    protected  $data;
    protected UserDataService $userDataService;
    public function mount(userDataService $userDataService) : void
    {
        $this->userDataService = $userDataService;
        $this->user = request()->query('user') ?? Auth::user()->id;
        $this->data = $this->userDataService->getByUserId($this->user);

        if($this->data)
        {
            $this->user = $this->data->user_id;
            $this->city = $this->data->city;
            $this->region = $this->data->region;
            $this->address = $this->data->address;
            $this->post_code = $this->data->post_code;
            $this->phone_number = $this->data->phone_number;
        }
    }

    public function updateUserData(userDataService $userDataService) : void
    {
        $this->userDataService = $userDataService;

        $this->validate();

        $data = [
            'user_id' => $this->user,
            'city' => $this->city,
            'region' => $this->region,
            'address' => $this->address,
            'post_code' => $this->post_code,
            'phone_number' => $this->phone_number,
        ];

        $this->data = $this->userDataService->getByUserId($this->user);
        if(!$this->data)
        {
            $this->userDataService->createUserData($data);
            $this->dispatch('profile-data-updated');
            return;
        }
        $this->userDataService->updateUserData($this->data->id, $data);
        $this->dispatch('profile-data-updated');
    }
    public function render(userDataService $userDataService) : View
    {
        return view('livewire.profile.update-profile-additional-data');
    }
}
