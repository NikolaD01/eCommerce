<x-app-layout>
    @component('components.shop.buttons.create', ['route'=> route('products.create'), 'text' => 'Create product']) @endcomponent
    <div class="grid grid-cols-2">
        <div>
        @include('components.shop.products-parts.product-side-filter')
        </div>
        <div class="grid grid-cols-2 gap-4">

        @include('components.shop.products-parts.products-list', ['products' => $products])
        </div>

    </div>

</x-app-layout>
