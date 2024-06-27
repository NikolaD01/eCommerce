<?php

namespace App\Livewire;

use App\Services\Shop\SizeService;
use Livewire\Component;
use Livewire\Attributes\Validate;
class SizesUpdateForm extends Component
{
    #[Validate('required|string')]
    public string $name;
    #[Validate('required|string')]
    public string $description;
    protected sizeService $sizeService;
    public function __construct()
    {
        $this->sizeService = app(sizeService::class);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
        ];

        $this->sizeService->createSize($data);
        redirect(route('sizes.index'));
        return session()->flash('message', 'Size created successfully');
    }

    public function render()
    {
        return view('livewire.sizes-update-form');
    }
}
