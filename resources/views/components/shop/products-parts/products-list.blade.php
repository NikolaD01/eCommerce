    @foreach($products as $product)
        <div class="" >
            <a class="inline-block	 hover:shadow-xl relative h-[430px] overflow-hidden rounded-xl" href="{{route('products.show', ['product' => $product->id])}}">
                <img alt="coverImage" loading="lazy" width="1000" height="1000" decoding="async" data-nimg="1" class="h-full w-full object-cover object-top"
                     style="color:transparent" src="https://ben10hero.com/wp-content/uploads/2016/07/cannonbolt_10k.png">
            </a>
            <div class="mt-5 space-y-1">
                <div class="flex items-center justify-between">
                    <a class="text-2xl font-medium" href="/products/brown-coat">{{$product->title}}</a>
                    <div class="flex items-center gap-3">
                        @foreach($product->colors as $color)
                            <button type="button" class="flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-{{$color->class}}-500 ring ring-transparent focus:ring-{{$color->class}}-300 w-4 h-4 "></button>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    @foreach($product->categories as $category)
                        <a class="text-xl">{{$category->categoryName}}</a>
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
                            <div>{{$size->name}}</div>
                        @endforeach
                    </div>
                </div>
                <form action="{{route('products.destroy', ['product' => $product->id])}}" method="POST" class="flex items-center justify-between">
                    @csrf
                    @method('DELETE')
                    <span class="text-2xl font-medium text-secondary">$ {{$product->price}}</span>
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </div>

        </div>
    @endforeach
