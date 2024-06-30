<x-portal-layout>
    @include('components.hero-banners.small')
    <div class="grid grid-cols-4">
        <div></div>
        <div class="col-span-3 ">
            <livewire:components.product.product-list/>
        </div>
    </div>
</x-portal-layout>
