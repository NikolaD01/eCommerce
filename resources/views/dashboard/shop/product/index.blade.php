<x-app-layout>
    <section class="product grid grid-cols-2 place-items-center">
        <div class="product-form flex justify-center w-full">
            <livewire:product-update-form  :data="[
                'product' => $product,
                'categories' => $categories,
                'materials' => $materials,
                'sizes' => $sizes,
                'colors' => $colors,
                'medias' => $medias
            ]"
            />
        </div>
        <livewire:product-view :product="$product" />
    </section>
</x-app-layout>
