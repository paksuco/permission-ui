@isset($role)
<table class="table w-4/5 text-base border-collapse paksuco-permissions">
    <thead class="">
        <tr>
            <th class="relative hidden sm:table-cell">
                <h3 class="absolute inset-0 items-end justify-start hidden pb-2 text-lg font-normal text-gray-600 sm:flex">@lang("Permissions")</h3>
            </th>
            @if($useActions)
            @foreach($actions as $key => $action)
            <th class="p-1">
                <div class="p-2 mb-1 text-xs font-normal rounded-md bg-cool-gray-100">
                    <i class='text-gray-700 pt-1 subpixel-antialiased text-base sm:text-2xl {{$action}}' alt='{{$key}}' style="min-width: 48px"></i>
                    <div class="text-gray-700 capitalize">{{$key}}</div>
                </div>
            </th>
            @endforeach
            @endif
        </tr>
    </thead>
    <tbody>
        @php
            $looper = $useActions ? $permissionGroups : $permissions;
        @endphp
        @forelse ($looper as $permission)
        @php $rowmod = $loop->even @endphp
        <tr class="sm:hidden">
            <td colspan="5" class="px-4 pt-2 w-full rounded-t-lg  {{ $rowmod ? 'bg-gray-100' : 'bg-cool-gray-100' }}">
                @livewire("permission-ui::permission-actions", [
                    "permission" => $useActions ? $permission : $permission->name
                ], key("permission-actions-1-" . ($useActions ? $permission : $permission->id)))
            </td>
        </tr>
        <tr>
            <td class="hidden sm:table-cell px-4 w-full rounded-l-lg  {{ $rowmod ? 'bg-gray-100' : 'bg-cool-gray-100' }}">
                @livewire("permission-ui::permission-actions", [
                    "permission" => $useActions ? $permission : $permission->name
                ], key("permission-actions-2-" . ($useActions ? $permission : $permission->id)))
            </td>
            @if($useActions)
            @foreach($actions as $key => $action)
            @php $perm = $permissions->where("name", "=", $permission . "-" . $key)->first(); @endphp
            <td class="p-2 text-center {{$loop->first ? 'rounded-bl-lg sm:rounded-bl-none' : ''}} {{ $loop->last ? 'rounded-br-lg sm:rounded-r-lg' : '' }} {{ $rowmod ? 'bg-gray-100' : 'bg-cool-gray-100' }}">
                @if($perm instanceof \Spatie\Permission\Models\Permission)
                @livewire("permission-ui::button", [
                    "role" => $role,
                    "permission" => $perm->id
                ], key("permission-button-1-$perm->id-$role"))
                @else
                <i class='p-2 subpixel-antialiased font-bold text-orange-200 bg-gray-200 rounded-lg fas fa-exclamation-triangle text -lg cursor-disabled'></i>
                @endif
            </td>
            @endforeach
            @else
            <td class="p-2 text-center rounded-r bg-cool-gray-200">
                @if($permission instanceof \Spatie\Permission\Models\Permission)
                    @livewire("permission-ui::button", [
                            "role" => $role,
                            "permission" => $permission->id
                        ], key("permission-button-2-$permission->id-$role"))
                @else
                <i class='p-2 subpixel-antialiased font-bold text-orange-200 bg-gray-200 rounded-lg fas fa-exclamation-triangle text -lg cursor-disabled'></i>
                @endif
            </td>
            @endif
        </tr>
        <tr class="block h-1 bg-transparent"></tr>
        @empty
        <tr>
            <td class="w-full text-sm">
                <div class="px-6 py-3 bg-yellow-100 border border-yellow-200 rounded">@lang('No permissions found. Start with adding a new permission using the form below.')</div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endisset
