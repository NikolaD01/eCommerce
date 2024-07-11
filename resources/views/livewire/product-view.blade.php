<div class="product-container" >
    <a class="relative h-[430px] overflow-hidden rounded-xl object-cover" href="{{route('portal.products.show', ['product' => $product->id])}}">
        <img alt="coverImage" loading="lazy" width="1000" height="1000" decoding="async" data-nimg="1" class="h-full w-full object-cover object-top"
             style="color:transparent" src="{{asset('storage/'.$media->path)}}">
    </a>
    <div class="mt-5 p-4 ">
        <div class="flex items-center justify-between">
            <a class="text-2xl font-medium" href="/products/brown-coat">{{$product->title}}</a>
            <div class="flex items-center gap-3">
                @foreach($colors as $color)
                    <button wire:click="$dispatchSelf('color', {product: {{$product->id}}, color: {{$color->id}} })" type="button" class="flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-{{$color->class}}-500 ring ring-transparent focus:ring-{{$color->class}}-300 w-4 h-4 "></button>
                @endforeach
            </div>
        </div>
        <div class="flex items-center gap-3">
            @foreach($product->categories as $category)
                <a class="text-xl">{{$category->category_name}}</a>
            @endforeach
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                @foreach($product->materials as $material)
                    <a class="">{{$material->name}}</a>
                @endforeach
            </div>
            <div class="flex items-center gap-3">
                @foreach($product->sizes as $size)
                    <button>{{$size->name}}</button>
                @endforeach
            </div>
        </div>
        <div class="flex items-center justify-between mt-5">
            <span class="text-2xl font-medium text-secondary">$ {{$product->price}}</span>
            @if(Str::contains(url()->current(), 'shop'))
                <livewire:portal.utility.add-to-cart/>
            @endif
        </div>

    </div>
</div>
