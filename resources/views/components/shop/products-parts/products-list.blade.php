    @foreach($products as $product)
        <div class="" >
            <a class="inline-block	 hover:shadow-xl relative h-[430px] overflow-hidden rounded-xl" href="{{route('products.show', ['product' => $product->id])}}">
                <img alt="coverImage" loading="lazy" width="1000" height="1000" decoding="async" data-nimg="1" class="h-full w-full object-cover object-top"
                     style="color:transparent" src="{{asset('storage/'.$product->medias[0]->path)}}">
            </a>

            <div class="mt-5 space-y-1">
                <div class="flex items-center justify-between">
                    <a class="text-2xl font-medium" href="/products/brown-coat">{{$product->title}}</a>
                    <div class="flex items-center gap-3">
                        @foreach($product->medias as $media)
                            <button type="button" class="flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-{{$media->color->class}}-500 ring ring-transparent focus:ring-{{$media->color->class}}-300 w-4 h-4 "></button>
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
