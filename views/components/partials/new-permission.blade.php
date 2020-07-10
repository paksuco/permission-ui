<div class="mb-3 p-3">
    <h2 class="text-xl font-bold text-black border-b border-blue-800 mb-3">@lang("Add new Permission")</h2>
    <form wire:submit.prevent="saveNewPermission" class="w-full max-w-lg">
        <div class="md:flex md:items-center mb-6 text-sm">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                    @lang("Permission Name")
                </label>
            </div>
            <div class="md:w-2/3 flex relative">
                <input wire:model.debounce.500ms="permissionName" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full
                py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mr-3"
                       type="text">
                @error('permissionName')<span class="absolute top-10 left-0 text-red-700 text-xs">{{ $message }}</span>@endif
                @error('permissionNameSuffixed')<span class="absolute top-10 left-0 text-red-700 text-xs">{{ $message }}</span>@endif
                <button class="shadow bg-purple-500 hover:bg-purple-400 whitespace-no-wrap focus:shadow-outline
                focus:outline-none text-white font-bold py-2 px-4 rounded" wire:loading.attr="disabled" type="submit">
                    @lang("Create new Permission")
                </button>
            </div>
        </div>
    </form>
</div>
