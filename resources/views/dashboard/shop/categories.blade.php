<x-app-layout>
    @foreach($categories as $category)
        <h1><a href="{{route('categories.show', ['category' => $category])}}"><span>{{$category->id}}</span>. {{$category->categoryName}}</a></h1>
    @endforeach
</x-app-layout>
