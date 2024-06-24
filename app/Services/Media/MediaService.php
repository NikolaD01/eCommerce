<?php

namespace App\Services\Media;

use Illuminate\Support\Facades\File;

class MediaService
{
    protected BaseRepositoryInterface $mediaRepository;

    public function __construct(BaseRepositoryInterface $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    public function getAllMedias()
    {
        return $this->mediaRepository->getAll();
    }

    public function getMedia($id)
    {
        return $this->mediaRepository->getById($id);
    }

    public function deleteMedia($id)
    {
        return $this->mediaRepository->delete($id);
    }

    public function createMedia(array $data)
    {
        $fileData = $this->storefile($data['file']);
        $data[] = $fileData;

        return $this->mediaRepository->create($data);
    }
    public function updateMedia($id, array $data)
    {
        return $this->mediaRepository->update($id, $data);
    }

    public function storeFile($file)
    {
        $path = $file->store('uploads', 'public');
        $extension = File::extension($path);
        return ['path' => $path , 'extension' => $extension];
    }
}
