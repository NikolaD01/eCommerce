<?php

namespace App\Livewire\Medias;

use App\Services\Media\MediaService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class MediaForm extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:225|min:4')]
    public string $name;
    #[Validate('nullable|string|max:225|min:4')]
    public string $alt;
    #[Validate('required|integer')]
    public int $color_id;

    #[Validate('required')]
    public $file;
    protected MediaService $mediaService;
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

        $this->dispatch('refresh');

    }

    public function render()
    {
        return view('livewire.medias.media-form');
    }
}
