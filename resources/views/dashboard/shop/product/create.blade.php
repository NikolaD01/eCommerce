<x-app-layout>
    <livewire:product-update-form :data="[
    'categories' => $categories,
    'materials' => $materials,
    'sizes' => $sizes,
    'medias' => $medias]"/>
</x-app-layout>
