<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ProductUpdateForm extends Component
{
    public $data;

    public function __construct()
    {
    }
    public function mount($data)
    {
      $this->data = $data;
    }
    public function render()
    {
        return view('livewire.product-update-form');
    }
}
