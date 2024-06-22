<?php

namespace App\Livewire;


use App\Services\Shop\ColorService;
use Livewire\Component;

class ColorsUpdateForm extends Component
{

    public $name;
    public $class;
    protected $colorService;
    protected $rules = [
      'name' => 'required',
      'class' => 'required',
    ];
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
        redirect(route('colors.index'));
        return session()->flash('message', 'Color created successfully');
    }
    public function render()
    {
        return view('livewire.colors-update-form');
    }
}
