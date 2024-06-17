<x-app-layout>
    <div>
        @foreach($colors as $color)
            <p>{{$color->name}}</p>
        @endforeach

    </div>
</x-app-layout>
