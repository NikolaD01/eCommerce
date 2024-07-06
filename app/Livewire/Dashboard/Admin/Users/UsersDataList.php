<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Services\User\UserService;
use Livewire\Component;

class UsersDataList extends Component
{
    public $users;

    public function render(UserService $userService)
    {
        $this->users = $userService->getAllUsers();
        return view('livewire.dashboard.admin.users.users-data-list');
    }
}
