@isset($role)
<table class="table w-full paksuco-permissions border-collapse text-base">
    <thead class="">
        <tr>
            <th class="relative hidden sm:table-cell">
                <h3 class="absolute hidden sm:flex inset-0 text-lg font-normal text-gray-600 justify-start items-end pb-2">@lang("Permissions")</h3>
            </th>
            @if($useActions)
            @foreach($actions as $key => $action)
            <th class="p-1">
                <div class="font-normal text-xs bg-cool-gray-100 rounded-md p-2 mb-1">
                    <i class='text-gray-700 pt-1 subpixel-antialiased text-base sm:text-2xl {{$action}}' alt='{{$key}}' style="min-width: 48px"></i>
                    <div class="capitalize text-gray-700">{{$key}}</div>
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
        @foreach ($looper as $permission)
        @php $rowmod = $loop->even @endphp
        <tr class="sm:hidden">
            <td colspan="5" class="px-4 pt-2 w-full rounded-t-lg  {{ $rowmod ? 'bg-gray-100' : 'bg-cool-gray-100' }}">
                @livewire("permission-ui::permission-actions", [
                    "permission" => $useActions ? $permission : $permission->name
                ], key("permission-" . ($useActions ? $permission : $permission->id)))
            </td>
        </tr>
        <tr>
            <td class="hidden sm:table-cell px-4 w-full rounded-l-lg  {{ $rowmod ? 'bg-gray-100' : 'bg-cool-gray-100' }}">
                @livewire("permission-ui::permission-actions", [
                    "permission" => $useActions ? $permission : $permission->name
                ], key("permission-" . ($useActions ? $permission : $permission->id)))
            </td>
            @if($useActions)
            @foreach($actions as $key => $action)
            @php $perm = $permissions->where("name", "=", $permission . "-" . $key)->first(); @endphp
            <td class="p-2 text-center {{$loop->first ? 'rounded-bl-lg sm:rounded-bl-none' : ''}} {{ $loop->last ? 'rounded-br-lg sm:rounded-r-lg' : '' }} {{ $rowmod ? 'bg-gray-100' : 'bg-cool-gray-100' }}">
                @if($perm instanceof \Spatie\Permission\Models\Permission)
                @livewire("permission-ui::button", [
                    "role" => $role,
                    "permission" => $perm->id
                ], key("permission-button-$perm->id-$role"))
                @else
                <i class='bg-gray-200 subpixel-antialiased p-2 rounded-lg fas fa-exclamation-triangle text-orange-200 text -lg font-bold cursor-disabled'></i>
                @endif
            </td>
            @endforeach
            @else
            <td class="p-2 text-center">
                @if($permission instanceof \Spatie\Permission\Models\Permission)
                    @livewire("permission-ui::button", [
                            "role" => $role,
                            "permission" => $permission->id
                        ], key("permission-button-$permission->id-$role"))
                @else
                <i class='bg-gray-200 subpixel-antialiased p-2 rounded-lg fas fa-exclamation-triangle text-orange-200 text -lg font-bold cursor-disabled'></i>
                @endif
            </td>
            @endif
        </tr>
        <tr class="bg-transparent h-1 block"></tr>
        @endforeach
    </tbody>
</table>
@endisset
