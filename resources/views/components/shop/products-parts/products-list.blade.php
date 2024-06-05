<div class="flex flex-wrap">
    @foreach($products as $product)
        <div class="flex flex-col w-1/5">
            <h3>{{$product->title}}</h3>
            <p>{{$product->description}}</p>
            <span>{{$product->price}}</span>
        </div>
    @endforeach
</div>
