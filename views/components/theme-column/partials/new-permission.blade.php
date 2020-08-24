<form wire:submit.prevent="saveNewPermission" class="flex px-4 py-2 items-center justify-end text-sm">
    @error('permissionName')<span class="text-red-700 text-xs mr-2">{{ $message }}</span>@endif
    @error('permissionNameSuffixed')<span class="text-red-700 text-xs mr-2">{{ $message }}</span>@endif
    <input wire:model.debounce.500ms="permissionName" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded placeholder-gray-800
                py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500 mr-2"
           type="text" placeholder="@lang('Permission Name')">
    <button class="shadow bg-indigo-500 hover:bg-indigo-400 whitespace-no-wrap focus:shadow-outline
                focus:outline-none text-white font-bold py-2 px-4 rounded" wire:loading.attr="disabled" type="submit">
        <i class="fa fa-plus"></i>
    </button>
</form>
