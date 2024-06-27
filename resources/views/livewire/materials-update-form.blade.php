<div>
    <form  wire:submit.prevent="save">
        <div>
            <label for="name">Category name</label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   type="text" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="name">Category description</label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   type="text" wire:model="description">
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-2 rounded text-white font-bold">Save</button>

    </form>
</div>
