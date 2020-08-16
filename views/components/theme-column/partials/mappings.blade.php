@isset($role)
<table class="table paksuco-permissions border-collapse bg-white mr-4">
    <thead>
        <tr>
            <th class="px-4 border-b border-r bg-cool-gray-100 text-left">@lang("Permissions")</th>
            @if($useActions)
            @foreach($actions as $key => $action)
            <th class="p-1 border-b border-r bg-cool-gray-200 font-normal text-sm @if($loop->last) border-r-0 @endif">
                <i class='text-gray-600 subpixel-antialiased p-2 text-lg {{$action}}'
                    alt='{{$key}}'></i><div class="capitalize">{{$key}}</div>
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
            <td class="px-4 border-b w-full">
                @livewire("permission-ui::permission-actions", ["permission" => $permission], key("permission-" .
                ($useActions ? $permission : $permission->id)))
            </td>
            @if($useActions)
            @foreach($actions as $key => $action)
            @php $perm = $permissions->where("name", "=", $permission . "-" . $key)->first(); @endphp
            <td class="p-1 border text-center">
                @if($perm instanceof \Spatie\Permission\Models\Permission)
                @include("permission-ui::components.theme-column.partials.button", ["role" => $role, "permission" =>
                $perm])
                @else
                <i
                    class='bg-gray-200 subpixel-antialiased p-2 rounded-lg fas fa-exclamation-triangle text-orange-200 text -lg font-bold cursor-disabled'></i>
                @endif
            </td>
            @endforeach
            @else
            <td class="p-1 border text-center">
                @if($permission instanceof \Spatie\Permission\Models\Permission)
                @include("permission-ui::components.theme-column.partials.button", ["role" => $role, "permission" =>
                $permission])
                @else
                <i
                    class='bg-gray-200 subpixel-antialiased p-2 rounded-lg fas fa-exclamation-triangle text-orange-200 text -lg font-bold cursor-disabled'></i>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endisset
