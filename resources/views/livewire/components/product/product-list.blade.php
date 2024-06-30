<div class="grid gap-32 grid-cols-2">
    @foreach($products as $product)
        <livewire:product-view :product="$product"/>
    @endforeach

</div>
