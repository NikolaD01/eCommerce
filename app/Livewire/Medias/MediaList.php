<?php

namespace App\Livewire\Medias;

use Livewire\Attributes\On;
use App\Services\Media\MediaService;
use Livewire\Component;

class MediaList extends Component
{
    public array $medias;
    public int $paged = 1;
    protected MediaService $mediaService;
    public int $itemsPerPage = 4;
    public function __construct()
    {
        $this->mediaService = app(MediaService::class);
        $this->medias = $this->mediaService->paginate($this->itemsPerPage, $this->paged);
    }
    #[On('refresh')]
    public function refresh()
    {
        $this->medias = $this->mediaService->paginate($this->itemsPerPage, $this->paged);
    }
    public function paginate($paged)
    {
        $this->paged = $paged;
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.medias.media-list');
    }
}
