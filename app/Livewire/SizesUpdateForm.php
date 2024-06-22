<?php

namespace App\Livewire;

use App\Services\Shop\SizeService;
use Livewire\Component;

class SizesUpdateForm extends Component
{
    public $name;
    public $description;

    protected $sizeService;
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

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
