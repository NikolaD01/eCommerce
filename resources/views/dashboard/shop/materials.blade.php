<x-app-layout>
    <div class="grid grid-cols-2">
        <div class="flex flex-col gap-2">
            @foreach($materials as $material)
                <div class="grid grid-cols-2">
                    <p><span>{{$material->id}}. </span>{{$material->name}}</p>
                    <form action="{{route('materials.destroy', ['material' => $material->id])}}" method="POST" class="flex items-center justify-between">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        <livewire:materials-update-form />
    </div>
</x-app-layout>
