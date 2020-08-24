<h2 class="text-xl font-bold text-black border-b border-blue-800 mb-3">@lang("Current Roles & Permissions")</h2>
<div class="overflow-x-visible">
    <table class="table paksuco-permissions">
        <thead>
            <tr>
                <th></th>
                @foreach($roles as $role)
                <th colspan="{{$useActions ? count($actions) : 1}}" class="p-1 font-normal pr-3">
                    @livewire("permission-ui::role-actions", ["role" => $role], key("role-" . $role))
                </th>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach($roles as $role)
                @if($useActions)
                @foreach($actions as $key => $action)
                <th class="p-1 @if($loop->last) pr-3 @endif">
                    <i class='bg-gray-200 text-gray-600 subpixel-antialiased p-2 rounded-lg {{$action}}'
                       alt='{{$key}}'></i>
                </th>
                @endforeach
                @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php
            $looper = $useActions ? $permissionGroups : $permissions;
            @endphp
            @foreach ($looper as $permission)
            <tr>
                <td class="p-1 pr-3">
                    @livewire("permission-ui::permission-actions", [
                        "permission" => $permission
                    ], key("permission-" . ($useActions ? $permission : $permission->id)))
                </td>
                @foreach($roles as $role)
                @if($useActions)
                @foreach($actions as $key => $action)
                @php $perm = $permissions->where("name", "=", $permission . "-" . $key)->first(); @endphp
                <td class="p-1 text-center @if($loop->last) pr-3 @endif">
                    @if($perm instanceof \Spatie\Permission\Models\Permission)
                    @livewire("permission-ui::button", [
                        "role" => $role->id,
                        "permission" => $perm->id
                    ], key("permission-button-$perm->id-$role"))
                    @else
                    <i
                       class='bg-gray-200 subpixel-antialiased p-2 rounded-lg fas fa-exclamation-triangle text-orange-200 text -lg font-bold cursor-disabled'></i>
                    @endif
                </td>
                @endforeach
                @else
                <td class="p-1 text-center">
                    @if($permission instanceof \Spatie\Permission\Models\Permission)
                    @livewire("permission-ui::button", [
                    "role" => $role->id,
                    "permission" => $permission->id
                ], key("permission-button-$permission->id-$role"))
                    @else
                    <i
                       class='bg-gray-200 subpixel-antialiased p-2 rounded-lg fas fa-exclamation-triangle text-orange-200 text -lg font-bold cursor-disabled'></i>
                    @endif
                </td>
                @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
