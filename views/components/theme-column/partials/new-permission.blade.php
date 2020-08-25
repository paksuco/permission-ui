<form wire:submit.prevent="saveNewPermission" class="flex pt-8 items-center text-sm">
    <div>
        <h3 class="text-lg font-normal pb-2 text-gray-600 ">@lang("Add new Permission")</h3>
        <div>
            @error('permissionName')<span class="text-red-700 text-xs mr-2">{{ $message }}</span>@endif
            @error('permissionNameSuffixed')<span class="text-red-700 text-xs mr-2">{{ $message }}</span>@endif
            <input wire:model.debounce.500ms="permissionName" class="bg-gray-200 appearance-none shadow rounded placeholder-gray-800
                py-2 px-4 text-gray-700 leading-tight focus:outline-none mr-1 focus:bg-white"
                   type="text" placeholder="@lang('Permission Name')">
            <button class="shadow bg-indigo-500 hover:bg-indigo-400 whitespace-no-wrap focus:shadow-outline
                focus:outline-none text-white font-bold py-2 px-4 rounded" wire:loading.attr="disabled" type="submit">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</form>
