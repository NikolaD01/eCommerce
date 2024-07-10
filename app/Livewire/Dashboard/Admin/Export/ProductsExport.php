<?php

namespace App\Livewire\Dashboard\Admin\Export;

use App\Services\Utility\ExportUtility;
use Livewire\Component;

class ProductsExport extends Component
{
    public function exportCsv()
    {
         return ExportUtility::exportCsv();
    }

    public function render()
    {
        return view('livewire.dashboard.admin.export.products-export');
    }
}
