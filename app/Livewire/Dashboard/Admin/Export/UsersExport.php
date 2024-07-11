<?php

namespace App\Livewire\Dashboard\Admin\Export;

use App\Services\Utility\UserExportUtility;
use Livewire\Component;

class UsersExport extends Component
{
    public function exportCsv()
    {
        return UserExportUtility::exportCsv();
    }

    public function render()
    {
        return view('livewire.dashboard.admin.export.users-export');
    }
}
