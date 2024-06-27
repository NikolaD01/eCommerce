<?php

namespace App\Livewire;

use App\Services\Shop\MaterialService;
use Livewire\Component;
use Livewire\Attributes\Validate;
class MaterialsUpdateForm extends Component
{
    #[Validate('required|min:2')]
    public string $name;

    #[Validate('required|min:2')]
    public string $description;

    protected MaterialService $materialService;

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
        return redirect(route('materials.index'))->with('success','Material created successfully');

    }
    public function render()
    {
        return view('livewire.materials-update-form');
    }
}
