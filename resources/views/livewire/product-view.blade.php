<div class="product-container w-1/2" >
    <div class="relative h-[430px] overflow-hidden rounded-xl object-cover	">
        <img alt="coverImage" loading="lazy" width="1000" height="1000" decoding="async" data-nimg="1" class="h-full w-full object-cover object-top"
             style="color:transparent" src="https://cdn.pixabay.com/photo/2023/05/26/13/58/man-8019544_960_720.jpg"></div>
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
        <span class="text-2xl font-medium text-secondary">$ {{$product->price}}</span>
    </div>
</div>
