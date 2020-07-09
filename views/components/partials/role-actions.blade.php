<div class="relative whitespace-no-wrap min-w-full inline-block text-left w-full" x-data="{ open: false }" @keydown.window.escape="open = false"
     @click.away="open = false" @refresh-mappings="open = false">
    <div>
        <span class="rounded-md shadow-sm z-0">
            <button @click="open = !open" type="button"
                    class="inline-flex justify-between w-full rounded-md border border-gray-300 px-4 py-2 bg-white leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                    aria-haspopup="true" aria-expanded="true">
                {{ $role->name }}
                <svg class="-mr-1 ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd" />
                </svg>
            </button>
        </span>
    </div>
    <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state."
         x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="origin-top-right absolute left-0 mt-2 w-full rounded-md shadow-lg z-10"
         style="width: min-content">
        <div class="rounded-md bg-white" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <div class="px-4 py-2 font-medium bg-purple-600 text-white rounded-t-md">
                Edit Role
            </div>
            <div class="px-3 py-3">
                @if(count($errors))
                <div class="w-full">
                    @foreach ($errors->all() as $message)
                    <div class="bg-red-200 p-2 rounded text-gray-900 text-sm leading-4 mb-1"><b>Error: </b>{{ $message }}</div>
                    @endforeach
                </div>
                @endif
                <div class="w-full mb-1">
                    <div class="text-xs">Role Name: </div>
                    <input wire:model.debounce.500ms="name" class="shadow-inner appearance-none border w-full rounded mb-3 p-1 text-gray-700
                           leading-tight focus:outline-none focus:shadow-none">
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="updateRole" href="#" class="w-full rounded p-1 px-3 text-center text-white bg-blue-500
                            hover:bg-blue-700 focus:outline-none" role="menuitem">Update Name
                    </button>
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="allowAll" href="#" class="w-full rounded p-1 px-3 text-center text-white bg-green-500
                    hover:bg-green-700 focus:outline-none" role="menuitem">Grant All Permissions
                    </button>
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="disallowAll" href="#" class="w-full rounded p-1 px-3 text-center text-black bg-yellow-300
                    hover:bg-yellow-400 focus:outline-none" role="menuitem">Revoke All Permissions
                    </button>
                </div>
                <div class="w-full">
                    <button type="button" wire:click="deleteRole" href="#" class="w-full rounded p-1 px-3 text-center text-white bg-red-500
                    hover:bg-red-700 focus:outline-none" role="menuitem">Delete Role
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
