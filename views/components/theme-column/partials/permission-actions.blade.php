@php $perm_key = \Illuminate\Support\Str::random(6) @endphp
<div class="relative permission-ui-dropdown"
    x-data="{ open: false }"
    :key="'{{$perm_key}}'"
    @keydown.window.escape="open = false"
    @click.away="open = false"
    @refresh-mappings.window="open = false">
    <div class="flex">
        <div class="flex-1">
            {{$name}} - {{$perm_key}}
        </div>
        <button @click="open = !open" type="button"
            class="inline-flex border-0 rounded-none"
            aria-haspopup="true"
            aria-expanded="true">
            <i class="fa fa-ellipsis-v"></i>
        </button>
    </div>
    <div x-show="open" x-cloak x-description="Dropdown panel, show/hide based on dropdown state."
        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-0"
        x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-0"
        class="origin-top-right absolute left-full transform -translate-x-full top-0 mt-2 rounded-md shadow-lg z-10
         text-gray-700"
        style="width: 200px">
        <div class="rounded-md bg-white" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <div class="px-4 py-2 font-light text-lg rounded-t-md">
                @lang("Edit Permission")
            </div>
            <div class="px-3 py-3">
                @if(count($errors))
                <div class="w-full">
                    @foreach ($errors->all() as $message)
                    <div class="bg-red-200 p-2 rounded text-gray-900 text-sm leading-4 mb-1"><b>@lang("Error"):
                        </b>{{ $message }}</div>
                    @endforeach
                </div>
                @endif
                <div class="w-full mb-1">
                    <input wire:model.debounce.500ms="name" class="bg-cool-gray-200 appearance-none w-full rounded p-2 text-gray-700
                    leading-tight focus:outline-none focus:shadow-none" wire:loading.attr="disabled">
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="updatePermission" href="#" class="w-full rounded p-1 px-3 bg-indigo-100
                    hover:bg-indigo-200 focus:outline-none text-left" role="menuitem"
                        wire:loading.attr="disabled">@lang("Update")
                    </button>
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="allowAll" href="#" class="w-full rounded p-1 px-3 bg-indigo-100
                    hover:bg-indigo-200 focus:outline-none text-left" role="menuitem"
                        wire:loading.attr="disabled">@lang("Authorize All")
                    </button>
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="disallowAll" href="#" class="w-full rounded p-1 px-3 bg-indigo-100
                    hover:bg-indigo-200 focus:outline-none text-left" role="menuitem"
                        wire:loading.attr="disabled">@lang("Unauthorize All")
                    </button>
                </div>
                <div class="w-full">
                    <button type="button" wire:click="deletePermission" href="#" class="w-full rounded p-1 px-3 bg-indigo-100
                    hover:bg-indigo-200 focus:outline-none text-left" role="menuitem" wire:loading.attr="disabled">@lang("Delete")
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
