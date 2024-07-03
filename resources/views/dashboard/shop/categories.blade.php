<x-app-layout>
    <div class="grid grid-cols-2">
        <div class="flex flex-col gap-2">
            @foreach($categories as $category)
                <div class="grid grid-cols-2">
                    <h1><a href="{{route('categories.show', ['category' => $category])}}"><span>{{$category->id}}</span>. {{$category->category_name}}</a></h1>
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
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

</x-app-layout>
