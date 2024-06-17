<x-app-layout>
<div>
    @foreach($sizes as $size)
        {{$size->name}}
    @endforeach
</div>
</x-app-layout>
