<div class="flex flex-col justify-center items-center">
    <div class="grid grid-cols-4 gap-10">
        @foreach($medias['data'] as $media)
            <div class="flex flex-col justify-evenly shadow-xl ">
                <img class="object-cover aspect-square h-1/2 w-full rounded-t-lg" alt="{{$media['alt']}}" src="{{asset('storage/'.$media['path'])}}">
                <div class=" flex flex-col gap-3">
                    <div class="grid grid-cols-2">
                        <p><strong>ID:</strong> {{$media['id']}}</p>
                        <p><strong>Name:</strong> {{$media['name']}}</p>
                    </div>
                    <div  class="grid grid-cols-2">
                        <p class="flex items-center gap-4"><strong>Color:</strong>
                            <button type="button" class="flex items-center justify-center rounded-full !leading-none disabled:bg-opacity-70 bg-{{$media['color']['class']}}-500 ring ring-transparent focus:ring-{{$media['color']['class']}}-300 w-4 h-4 "></button>
                        </p>
                        <p><strong>Extension:</strong> {{$media['extension']}}</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <p><strong>Alt</strong> {{$media['alt']}}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8">
                    <a href="{{route('medias.edit', ['media' => $media['id']])}}" class=" text-center bg-sky-500 hover:bg-sky-700 p-2 rounded text-white font-bold">Edit</a>
                    <form action="{{route('medias.destroy', ['media' => $media['id']])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-4 grid grid-cols-2 gap-4">
        <button wire:click="paginate({{ $paged - 1 }})" @if($paged <= 1) disabled @endif class="bg-sky-500 hover:bg-sky-700 p-2 rounded text-white font-bold">Previous</button>
        <button wire:click="paginate({{ $paged + 1 }})" @if($paged >= ceil($medias['total'] / $itemsPerPage)) disabled @endif class="bg-sky-500 hover:bg-sky-700  p-2 rounded text-white font-bold">Next</button>
    </div>
</div>
