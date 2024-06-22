<x-app-layout>
    <div>
        <div class="grid grid-cols-2">
            <div class="flex flex-col gap-2">
                @foreach($colors as $color)
                    <div class="grid grid-cols-2">
                        <p><span>{{$color->id}}. </span>{{$color->name}}</p>
                        <form action="{{route('colors.destroy', ['color' => $color->id])}}" method="POST" class="flex items-center justify-between">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <livewire:colors-update-form />
        </div>
    </div>
</x-app-layout>
