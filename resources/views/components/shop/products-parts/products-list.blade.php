    @foreach($products as $product)
        <a class="" href="{{route('products.show', ['product' => $product->id])}}">
            <div class="relative h-[430px] overflow-hidden rounded-xl">
                <img alt="coverImage" loading="lazy" width="1000" height="1000" decoding="async" data-nimg="1" class="h-full w-full object-cover object-top"
                     style="color:transparent" src="https://ben10hero.com/wp-content/uploads/2016/07/cannonbolt_10k.png"></div>
            <div class="mt-5 space-y-1">
                <div class="flex items-center justify-between">
                    <p class="text-2xl font-medium" >{{$product->title}}</p>
                    <div class="flex items-center gap-3">
                        <button type="button" class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-blue-500 ring ring-transparent focus:ring-blue-300 w-4 h-4 "></button>
                        <button type="button" class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-yellow-500 ring ring-transparent focus:ring-yellow-300 w-4 h-4 "></button>
                        <button type="button" class="ttnc-ButtonCircle flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-green-500 ring ring-transparent focus:ring-green-300 w-4 h-4 "></button>
                    </div>
                </div>
                <span class="text-2xl font-medium text-secondary">$ {{$product->price}}</span>
            </div>

        </a>
    @endforeach
