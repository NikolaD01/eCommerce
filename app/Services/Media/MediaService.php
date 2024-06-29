<?php

namespace App\Services\Media;
use App\Interfaces\MediaRepositoryInterface;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    protected MediaRepositoryInterface $mediaRepository;

    public function __construct(MediaRepositoryInterface $mediaRepository)
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

    public function getMediaByProduct($product)
    {
        return $this->mediaRepository->getByProduct($product);
    }
    public function getMediaColor($product, $color)
    {
        return $this->mediaRepository->getByColor($product, $color);
    }

    public function paginate($items, $paged)
    {
        return $this->mediaRepository->paginate($items, $paged)->toArray();
    }
    public function deleteMedia($id)
    {
        return $this->mediaRepository->delete($id);
    }

    public function createMedia(array $data)
    {
        $fileData = $this->storefile($data['file']);
        $data['path'] = $fileData['path'];
        $data['extension'] = $fileData['extension'];
        return $this->mediaRepository->create($data);
    }
    public function updateMedia($id, array $data)
    {
        return $this->mediaRepository->update($id, $data);
    }

    public function storeFile($file)
    {
        $fileHash = md5_file($file->getRealPath());
        $directory = 'uploads';
        $existingFile = collect(Storage::disk('public')->allFiles($directory))
            ->first(function ($filePath) use ($fileHash) {
                return $fileHash === md5_file(Storage::disk('public')->path($filePath));
            });

        if (!$existingFile)
        {
            $path = $file->store($directory, 'public');
            $extension = File::extension($path);
            return ['path' => $path, 'extension' => $extension];
        }
        else
        {
            $extension = File::extension($existingFile);
            return ['path' => $existingFile, 'extension' => $extension];
        }
    }
}
