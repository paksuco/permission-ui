<form wire:submit.prevent="saveNewRole" class="w-full max-w-lg">
    <div class="flex flex-col text-sm bg-white p-2 border rounded">
        <div class="w-full mb-2 flex items-center">
            <i class="fa fa-plus mr-2 ml-1 text-base text-indigo-500"></i>
            <input wire:model.debounce.500ms="roleName"
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full
                py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                type="text" placeholder="@lang('Role name')">
            @error('roleName')<span class="absolute top-10 left-0 text-red-700 text-xs">{{ $message }}</span>@endif
        </div>
        <button class="shadow bg-indigo-500 hover:bg-indigo-400 whitespace-no-wrap focus:shadow-outline w-full
            focus:outline-none text-white font-bold py-2 px-4 rounded" wire:loading.attr="disabled" type="button"
            wire:click="saveNewRole">
            @lang("Create new Role")
        </button>
    </div>
</form>
