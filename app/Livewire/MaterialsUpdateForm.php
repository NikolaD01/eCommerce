<?php

namespace App\Livewire;

use App\Services\Shop\MaterialService;
use Livewire\Component;

class MaterialsUpdateForm extends Component
{
    public $name;
    public $description;

    protected $materialService;
    protected $rules = [
        'name' => 'required|min:2',
        'description' => 'required|min:2',
    ];

    public function __construct()
    {
        $this->materialService = app(MaterialService::class);
    }

    public function save()
    {
        $this->validate();
        $data = [
          'name' => $this->name,
          'description' => $this->description
        ];

        $this->materialService->createMaterial($data);
        redirect(route('materials.index'));
        return session()->flash('message', 'Category created successfully!');
    }
    public function render()
    {
        return view('livewire.materials-update-form');
    }
}
