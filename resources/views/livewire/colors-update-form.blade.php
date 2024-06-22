<div>
    <form  wire:submit.prevent="save">
        <div>
            <label for="name">Color name</label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   type="text" wire:model="name">
        </div>
        <div>
            <label for="name">Tailwind color name</label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                   type="text" wire:model="class">
        </div>
        <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-2 rounded text-white font-bold">Save</button>

    </form>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
