<?php

namespace App\Livewire;

use App\Services\Media\MediaService;
use Livewire\Component;
use Livewire\WithFileUploads;

class MediaForm extends Component
{
    use WithFileUploads;

    public $name;
    public $alt;
    public $color_id;
    public $file;

    protected $mediaService;
    protected $rules = [
        'name' => 'required|string|max:225|min:4',
        'alt' =>  'nullable|string|max:225|min:4',
        'color_id' => 'required|integer',
        'file' => 'required'
    ];

    public function __construct()
    {
        $this->mediaService = app(MediaService::class);

    }

    public function save()
    {

        $this->validate();
        $data = [
            'name' => $this->name,
            'alt' => $this->alt,
            'color_id' => $this->color_id,
            'file' => $this->file
        ];

        $this->mediaService->createMedia($data);

    }

    public function render()
    {
        return view('livewire.media-form');
    }
}
