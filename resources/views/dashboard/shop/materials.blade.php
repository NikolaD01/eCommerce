<x-app-layout>
    <div>
        @foreach($materials as $material)
            {{$material->name}}
        @endforeach
    </div>
</x-app-layout>
