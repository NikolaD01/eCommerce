<x-app-layout>
    <div class="grid grid-cols-2">
        <div class="flex flex-col gap-2">
            @foreach($categories as $category)
                <div class="grid grid-cols-2">
                    <h1><a href="{{route('categories.show', ['category' => $category])}}"><span>{{$category->id}}</span>. {{$category->categoryName}}</a></h1>
                    <form action="{{route('categories.destroy', ['category' => $category->id])}}" method="POST" class="flex items-center justify-between">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                    </form>

                </div>
            @endforeach
        </div>
        <livewire:categories-update-form />
    </div>
</x-app-layout>
