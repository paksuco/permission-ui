<form wire:submit.prevent="saveNewRole" class="flex flex-col flex-no-wrap text-sm">
    <div class="flex-1 flex flex-row content-center">
        <input wire:model.debounce.500ms="roleName"
               class="bg-gray-200 rounded shadow
               placeholder-gray-800 py-2 px-3 text-gray-700 flex-1 leading-tight
               focus:bg-white
               focus:outline-none mr-2 min-w-0"
               type="text" placeholder="@lang('Role name')">
        <button type="button"
                class="shadow bg-indigo-500 hover:bg-indigo-400 whitespace-no-wrap focus:shadow-outline focus:outline-none text-white font-bold py-2 px-3 rounded"
                wire:loading.attr="disabled" wire:click="saveNewRole">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    @error('roleName')<span class="text-red-700 text-xs">{{ $message }}</span>@endif
</form>
