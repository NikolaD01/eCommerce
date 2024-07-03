<form wire:submit.prevent="save" class="w-1/2">
    @csrf
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex flex-col gap-3">
        <div >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">Title</label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            type="text" wire:model="title">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="desc">Description</label>
            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 resize-none "
            type="text" wire:model="description"> </textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">Price in $</label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   type="number" step="0.01" wire:model="price">
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " multiple
            wire:model="categories">
                <option selected>Choose a category</option>
                @foreach($data['categories'] as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
            @error('categories') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div >
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " multiple
            wire:model="materials">
                <option selected>Choose a materials</option>
                @foreach($data['materials'] as $material)
                    <option value="{{$material->id}}">{{$material->name}}</option>
                @endforeach
            </select>
            @error('materials') <span class="error">{{ $message }}</span> @enderror

        </div>
        <div>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " multiple
            wire:model="sizes">
                <option selected>Choose a sizes</option>
                @foreach($data['sizes'] as $size)
                    <option value="{{$size->id}}">{{$size->name}}</option>
                @endforeach
            </select>
            @error('sizes') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " multiple
                    wire:model="medias">
                <option selected>Choose a medias</option>
                @foreach($data['medias'] as $media)
                    <option value="{{$media->id}}">{{$media->name}}</option>
                @endforeach
            </select>
            @error('colors') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-2 rounded text-white font-bold">Save</button>
    </div>
</form>
