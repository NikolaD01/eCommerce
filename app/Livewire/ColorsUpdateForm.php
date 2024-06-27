<?php

namespace App\Livewire;


use App\Services\Shop\ColorService;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ColorsUpdateForm extends Component
{

    #[Validate('required|string')]
    public string $name;

    #[Validate('required|string')]
    public string $class;
    protected ColorService $colorService;
    public function __construct()
    {
        $this->colorService = app(ColorService::class);

    }

    public function save()
    {
        $this->validate();
        $data = [
          'name' => $this->name,
          'class' => $this->class,
        ];

        $this->colorService->createColor($data);
        return redirect(route('colors.index'))->with('message', 'Color created successfully');
    }
    public function render()
    {
        return view('livewire.colors-update-form');
    }
}
