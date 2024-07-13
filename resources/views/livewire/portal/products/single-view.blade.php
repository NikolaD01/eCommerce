<div>
    <div>
        <img height="50" width="50" src="{{asset('storage/'.$media->path)}}">
    </div>
    <div>
        {{$product->title}}
        <br>
        {{$product->description}}
        <br>
        {{$product->price}}
    </div>
    <div>
        <input placeholder="Available {{$product->quantity}} " type="number"  wire:model="quantity">        @foreach($colors as $color)
            <button wire:click="selectColor({{ $color->id }})" type="button" class="flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-{{$color->class}}-500 ring ring-transparent focus:ring-{{$color->class}}-300 w-4 h-4 "></button>
        @endforeach
        @foreach($product->sizes as $size)
            <button  wire:click="selectSize({{ $size->id }})">{{$size->name}}</button>
        @endforeach
    </div>
    <div>
        <button wire:click="addToCart" >Add to cart</button>
    </div>
</div>
