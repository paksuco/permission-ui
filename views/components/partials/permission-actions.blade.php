<div class="relative inline-block text-left w-full" x-data="{ open: false }" @keydown.window.escape="open = false" @click.away="open = false">
    <div>
        <span class="rounded-md shadow-sm z-0">
            <button @click="open = !open" type="button"
                    class="inline-flex justify-between w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                    aria-haspopup="true" aria-expanded="true">
                {{$permission->name}}
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
            <div class="py-1">
                <a href="#"
                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                   role="menuitem">Edit
                </a>
                <a href="#"
                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                   role="menuitem">Duplicate
                </a>
            </div>
            <div class="border-t border-gray-100"></div>
            <div class="py-1">
                <a href="#"
                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                   role="menuitem">Archive
                </a>
                <a href="#"
                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                   role="menuitem">Move
                </a>
            </div>
            <div class="border-t border-gray-100"></div>
            <div class="py-1">
                <a href="#"
                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                   role="menuitem">Share
                </a>
                <a href="#"
                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                   role="menuitem">Add to favorites
                </a>
            </div>
            <div class="border-t border-gray-100"></div>
            <div class="py-1">
                <a href="#"
                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                   role="menuitem">Delete
                </a>
            </div>
        </div>
    </div>
</div>
