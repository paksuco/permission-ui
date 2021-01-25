@php $role_key = \Illuminate\Support\Str::random(6) @endphp
<div class="relative permission-ui-dropdown"
    x-data="{ open: false }"
    :key='"{{$role_key}}"'
    @keydown.window.escape="open = false"
    @click.away="open = false"
    @refresh-mappings.window="open = false">
    <div @click="open = !open"
        class="inline-flex px-1 border-0 rounded-none focus:shadow-none focus:outline-none"
        aria-haspopup="true" aria-expanded="true">
        <i class="fa fa-ellipsis-v"></i>
    </div>
    <div x-show="open" x-cloak
        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-0"
        x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-0"
        class="absolute top-0 z-10 w-full min-w-full mt-2 text-gray-700 origin-top-left rounded-md shadow-lg left-full"
        style="width: 270px">
        <div class="bg-white rounded-md" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <div class="px-4 py-2 text-lg font-light rounded-t-md">
                @lang("Edit Role")
            </div>
            <div class="px-3 pb-3 text-sm">
                @if(count($errors))
                <div class="w-full">
                    @foreach ($errors->all() as $message)
                    <div class="p-2 mb-1 text-sm leading-4 text-gray-900 bg-red-200 rounded"><b>@lang("Error"):
                        </b>{{ $message }}</div>
                    @endforeach
                </div>
                @endif
                <div class="w-full mb-1">
                    <input wire:model.debounce.500ms="name" class="w-full p-2 leading-tight text-gray-700 rounded appearance-none bg-cool-gray-200 focus:outline-none focus:shadow-none" wire:loading.attr="disabled" placeholder="@lang('Role Name')">
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="updateRole" href="#" class="w-full p-2 px-3 text-left bg-indigo-100 rounded hover:bg-indigo-200 focus:outline-none" role="menuitem"
                        wire:loading.attr="disabled"><b>@lang("Update Name")</b>
                        <p class="text-xs">@lang('Updates the role name and saves it to the database')</p>
                    </button>
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="allowAll" href="#" class="w-full p-2 px-3 text-left bg-indigo-100 rounded hover:bg-indigo-200 focus:outline-none" role="menuitem" wire:loading.attr="disabled">
                        <b>@lang("Grant All Permissions")</b>
                        <p class="text-xs">@lang('Gives the role all the permissions defined in the system.')</p>
                    </button>
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="disallowAll" href="#" class="w-full p-1 px-3 text-left bg-indigo-100 rounded hover:bg-indigo-200 focus:outline-none" role="menuitem" wire:loading.attr="disabled">
                    <b>@lang("Revoke All Permissions")</b>
                    <p class="text-xs">@lang('Takes back all the permissions from the role.')</p>
                    </button>
                </div>
                <div class="w-full">
                    <button type="button" wire:click="deleteRole" href="#" class="w-full p-1 px-3 text-left bg-red-100 rounded hover:bg-red-200 focus:outline-none" role="menuitem" wire:loading.attr="disabled">
                    <b>@lang("Delete Role")</b>
                    <p class="text-xs">@lang('Removes the role from the system')</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
