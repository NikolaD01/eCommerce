<div class="flex items-center flex-col gap-2">
    <div class="flex flex-col justify-center w-1/2">
        <form wire:submit.prevent="save" class="flex flex-col gap-2">
            <div>
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">Name</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       type="text" wire:model="name">
            </div>
            <div>
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="alt">Alt</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       type="text" wire:model="alt">
            </div>
            <div>
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="color_id">Color ID</label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                       type="number" wire:model="color_id" >
            </div>

            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" wire:model="file" />
                </label>
            </div>
            <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-2 rounded text-white font-bold">Save</button>

        </form>
    </div>
</div>
