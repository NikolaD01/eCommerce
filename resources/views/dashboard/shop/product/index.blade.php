<x-app-layout>
    <section class="product grid grid-cols-2">
        <div class="product-form flex justify-center">
            <livewire:product-update-form  :data="[
                'product' => $product,
                'categories' => $categories,
                'materials' => $materials,
                'sizes' => $sizes,
                'colors' => $colors
            ]"
            />
        </div>
        <div class="product-container">
            <div class="relative h-[430px] overflow-hidden rounded-xl object-cover	">
                <img alt="coverImage" loading="lazy" width="1000" height="1000" decoding="async" data-nimg="1" class="h-full w-full object-cover object-top"
                     style="color:transparent" src="https://cdn.pixabay.com/photo/2023/05/26/13/58/man-8019544_960_720.jpg"></div>
            <div class="mt-5 space-y-1">
                <div class="flex items-center justify-between">
                    <a class="text-2xl font-medium" href="/products/brown-coat">{{$product->title}}</a>
                    <div class="flex items-center gap-3">
                        <button type="button" class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-blue-500 ring ring-transparent focus:ring-blue-300 w-4 h-4 "></button>
                        <button type="button" class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-yellow-500 ring ring-transparent focus:ring-yellow-300 w-4 h-4 "></button>
                        <button type="button" class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-green-500 ring ring-transparent focus:ring-green-300 w-4 h-4 "></button>
                    </div>
                </div>
                <span class="text-2xl font-medium text-secondary">$ {{$product->price}}</span>
            </div>
        </div>
    </section>
</x-app-layout>
