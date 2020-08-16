<div x-data="{ formVisible: false }" class="px-4">
    <a class="block mb-2 px-2 py-2 text-center rounded-lg" x-show="!formVisible"
        @click="formVisible = !formVisible"><i class="fa fa-plus"></i> @lang("Add new Role")</a>
    <a class="block mb-2 px-2 py-2 text-center rounded-lg" x-show="formVisible"
        @click="formVisible = !formVisible"><i class="fa fa-times"></i> @lang("Cancel")</a>
    <form wire:submit.prevent="saveNewRole" class="w-full max-w-lg" x-show="formVisible">
        <div class="flex flex-col text-sm px-4">
            <div class="w-full mb-1">
                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">
                    @lang("Role Name")
                </label>
            </div>
            <div class="w-full mb-2">
                <input wire:model.debounce.500ms="roleName" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full
                py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 mr-3"
                    type="text">
                @error('roleName')<span class="absolute top-10 left-0 text-red-700 text-xs">{{ $message }}</span>@endif
            </div>
            <button class="shadow bg-purple-500 hover:bg-purple-400 whitespace-no-wrap focus:shadow-outline w-full
            focus:outline-none text-white font-bold py-2 px-4 rounded" wire:loading.attr="disabled" type="button"
                wire:click="saveNewRole">
                @lang("Create new Role")
            </button>
        </div>
    </form>
</div>
