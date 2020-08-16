<div class="p-4">
    <form wire:submit.prevent="saveNewPermission" class="w-full flex">
        <input wire:model.debounce.500ms="permissionName" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full
                py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mr-3"
            type="text" placeholder="@lang('Permission Name')">
        @error('permissionName')<span
            class="absolute top-10 left-0 text-red-700 text-xs">{{ $message }}</span>@endif
        @error('permissionNameSuffixed')<span
            class="absolute top-10 left-0 text-red-700 text-xs">{{ $message }}</span>@endif
        <button class="shadow bg-purple-500 hover:bg-purple-400 whitespace-no-wrap focus:shadow-outline
                focus:outline-none text-white font-bold py-2 px-4 rounded" wire:loading.attr="disabled" type="submit">
            @lang("Create new Permission")
        </button>
    </form>
</div>
