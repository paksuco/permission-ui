<div class="mb-3 p-3">
    <h2 class="text-xl font-bold text-black border-b border-blue-800 mb-3">Current Roles & Permissions</h2>
    <table class="md:w-full table">
        <thead>
            <tr>
                <th></th>
                @foreach($roles as $role)
                <th colspan="{{$useActions ? count($actions) : 1}}" class="border px-4 py-2 bg-gray-200 font-normal">
                    @livewire("permission-ui::role-actions", ["role" => $role], key("role-" . $role->id))
                </th>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach($roles as $role)
                @if($useActions)
                @foreach($actions as $key => $action)
                <th class="text-xs border text-white bg-gray-800"><i class='{{$action}}' alt='{{$key}}'></i></th>
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
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    @if($useActions === false)
                    <td class="border px-4 py-2 bg-gray-200">
                        @livewire("permission-ui::permission-actions", ["permission" => $permission], key("permission-" . ($useActions ? $permission : $permission->id)))
                    </td>
                    @else
                    <td class="border px-4 py-2 bg-gray-200">
                        {{$permission}}
                    </td>
                    @endif
                    @foreach($roles as $role)
                        @if($useActions)
                            @foreach($actions as $key => $action)
                                @php $perm = $permissions->where("name", "=", $permission . "-" . $key)->first(); @endphp
                                <td class="border px-4 py-2 text-center">
                                    @if($perm)
                                        @if($role->hasPermissionTo($perm->name))
                                            <i
                                                wire:key='{{$role->id . "-" . $perm->id}}'
                                                wire:loading.class.remove="fa-check cursor-pointer text-green-600"
                                                wire:loading.class="cursor-wait fa-hourglass text-gray-300"
                                                wire:click="togglePermission({{$role->id}},{{$perm->id}})"
                                                class="fa fa-check text-lg font-bold text-green-600 cursor-pointer"
                                                style="min-width: 20px;"></i>
                                        @else
                                            <i
                                                wire:key='{{$role->id . "-" . $perm->id}}'
                                                wire:loading.class.remove="fa-times cursor-pointer text-red-600"
                                                wire:loading.class="cursor-wait fa-hourglass text-gray-300"
                                                wire:click="togglePermission({{$role->id}},{{$perm->id}})"
                                                class="fa fa-times text-lg font-bold text-red-600 cursor-pointer"
                                                style="min-width: 20px;"></i>
                                        @endif
                                    @else
                                        <i class='fas fa-exclamation-triangle text-orange-200 text -lg font-bold cursor-disabled'
                                        style="min-width: 20px;"></i>
                                    @endif
                                </td>
                            @endforeach
                        @else
                        <td class="border px-4 py-2 text-center">
                            @if($role->hasPermissionTo($permission->name))
                                <i
                                    wire:key='{{$role->id . "-" . $permission->id}}'
                                    wire:loading.class.remove="fa-check cursor-pointer text-green-600"
                                    wire:loading.class="cursor-wait fa-hourglass text-gray-300"
                                    wire:click="togglePermission({{$role->id}},{{$permission->id}})"
                                    class="fa fa-check text-lg font-bold text-green-600 cursor-pointer"
                                    style="min-width: 20px;"></i>
                            @else
                                <i
                                    wire:key='{{$role->id . "-" . $permission->id}}'
                                    wire:loading.class.remove="fa-times cursor-pointer text-red-600"
                                    wire:loading.class="cursor-wait fa-hourglass text-gray-300"
                                    wire:click="togglePermission({{$role->id}},{{$permission->id}})"
                                    class="fa fa-times text-lg font-bold text-red-600 cursor-pointer"
                                    style="min-width: 20px;"></i>
                            @endif
                        </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
