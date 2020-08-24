@isset($role)
<table class="table paksuco-permissions border-collapse bg-white mr-4">
    <thead>
        <tr>
            <th class="px-4 border-b bg-cool-gray-100 text-left">@lang("Permissions")</th>
            @if($useActions)
            @foreach($actions as $key => $action)
            <th class="p-1 border-b bg-cool-gray-100">
                <div class="bg-cool-gray-200 font-normal text-xs rounded-md p-1">
                    <i class='text-gray-600 pt-1 subpixel-antialiased text-2xl {{$action}}' alt='{{$key}}' style="min-width: 48px"></i>
                    <div class="capitalize">{{$key}}</div>
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
        <tr>
            <td class="px-4 w-full border-b">
                @livewire("permission-ui::permission-actions", [
                    "permission" => $permission
                ], key("permission-" . ($useActions ? $permission : $permission->id)))
            </td>
            @if($useActions)
            @foreach($actions as $key => $action)
            @php $perm = $permissions->where("name", "=", $permission . "-" . $key)->first(); @endphp
            <td class="p-1 text-center border-b">
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
            <td class="p-1 border-b text-center">
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
        @endforeach
    </tbody>
</table>
@endisset
