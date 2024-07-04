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
    public function save(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;


        $this->validate();
        $data = [
            'name' => $this->name,
            'alt' => $this->alt,
            'color_id' => $this->color_id,
            'file' => $this->file
        ];

        $media = $this->mediaService->createMedia($data);
        if(isset($media['message']))
        {
            session()->flash('message',$media['message']);
        }
        $this->dispatch('refresh');

    }

    public function render()
    {
        return view('livewire.medias.media-form');
    }
}
