<form wire:submit="save" class="w-1/2">
    <div class="flex flex-col gap-3">
        <div >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">Title</label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            type="text" wire:model="title">
        </div>

        <div>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="desc">Description</label>
            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 resize-none "
            type="text" wire:model="desc"> </textarea>
        </div>

        <div>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">Price in $</label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            type="number" wire:model="price">
        </div>

        <div>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white "
            wire:model="category">
                <option selected>Choose a category</option>
                @foreach($data['categories'] as $category)
                    <option>{{$category->categoryName}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " multiple   wire:model="category">
                <option selected>Choose a materials</option>
                @foreach($data['materials'] as $material)
                    <option>{{$material->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " multiple   wire:model="category">
                <option selected>Choose a sizes</option>
                @foreach($data['sizes'] as $size)
                    <option>{{$size->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " multiple   wire:model="category">
                <option selected>Choose a sizes</option>
                @foreach($data['colors'] as $color)
                    <option>{{$color->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</form>
