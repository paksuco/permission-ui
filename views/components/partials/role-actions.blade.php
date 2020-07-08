<div class="relative inline-block text-left w-full" x-data="{ open: false }" @keydown.window.escape="open = false" @click.away="open = false">
    <div>
        <span class="rounded-md shadow-sm z-0">
            <button @click="open = !open" type="button"
                    class="inline-flex justify-between w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                    aria-haspopup="true" aria-expanded="true">
                {{$role->name}}
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
         class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg z-10">
        <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
             aria-labelledby="options-menu">
            <div class="p-2">
                <div class="my-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                      Role Name
                    </label>
                    <input wire:model="name" class="shadow-inner appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if(count($errors))
                    @foreach ($errors->all() as $message)
                        <span class="my-2 block bg-red-300 py-1 px-2 rounded-md border border-red-400 text-gray-900 text-xs leading-4">{{ $message }}</span>
                    @endforeach
                    @endif
                  </div>
                <button type="button" wire:click="updateRole" href="#"
                   class="w-full mb-2 px-4 py-2 text-sm text-left rounded-md text-white bg-green-700 hover:bg-green-600 hover:text-gray-100 focus:outline-none"
                   role="menuitem">Update
                </button>
                <button type="button" wire:click="deleteRole" href="#"
                   class="w-full px-4 py-2 text-sm text-left rounded-md text-white bg-red-700 hover:bg-red-600 hover:text-gray-100 focus:outline-none"
                   role="menuitem">Delete
                </button>
            </div>
        </div>
    </div>
</div>
