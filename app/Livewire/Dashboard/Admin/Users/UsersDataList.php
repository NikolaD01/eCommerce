<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Services\User\UserDataService;
use Livewire\Component;

class UsersDataList extends Component
{
    public $users;

    public function render(UserDataService $userDataService)
    {
        $this->users = $userDataService->getAllUserData();
        return view('livewire.dashboard.admin.users.users-data-list');
    }
}
