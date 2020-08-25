<div class="flex-1 flex flex-row items-center relative mb-4">
    <input wire:model.debounce.500ms="searchKeyword"
        class="bg-gray-200 rounded shadow
            placeholder-gray-800 py-2 px-3 text-gray-700 flex-1 leading-tight
            focus:bg-white min-w-0 relative text-sm"
        type="text" placeholder="@lang('Role name')">
    <i class="fa fa-search absolute right-2 flex text-gray-500 justify-end items-center"></i>
</div>
