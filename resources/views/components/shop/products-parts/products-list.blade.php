    @foreach($products as $product)
        <a class=" " href="{{route('products.show', ['product' => $product->id])}}">
            <div class="hover:shadow-xl relative h-[430px] overflow-hidden rounded-xl">
                <img alt="coverImage" loading="lazy" width="1000" height="1000" decoding="async" data-nimg="1" class="h-full w-full object-cover object-top"
                     style="color:transparent" src="https://ben10hero.com/wp-content/uploads/2016/07/cannonbolt_10k.png">
            </div>
            <div class="mt-5 space-y-1">
                <div class="flex items-center justify-between">
                    <p class="text-2xl font-medium" >{{$product->title}}</p>
                    <div class="flex items-center gap-3">
                        @foreach($product->colors as $color)
                        <button type="button" class="flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-{{$color->class}}-500 ring ring-transparent focus:ring-{{$color->class}}-300 w-4 h-4 "></button>
                        @endforeach
                    </div>
                </div>
                <span class="text-2xl font-medium text-secondary">$ {{$product->price}}</span>
            </div>

        </a>
    @endforeach
