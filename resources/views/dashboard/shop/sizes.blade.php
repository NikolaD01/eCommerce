<x-app-layout>
    <div>
        <div class="grid grid-cols-2">
            <div class="flex flex-col gap-2">
                @foreach($sizes as $size)
                    <div class="grid grid-cols-2">
                        <p><span>{{$size->id}}. </span>{{$size->name}}</p>
                        <form action="{{route('sizes.destroy', ['size' => $size->id])}}" method="POST" class="flex items-center justify-between">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <livewire:sizes-update-form />
        </div>
    </div>
</x-app-layout>
