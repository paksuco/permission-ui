<div class="mb-3 p-3">
    <h2 class="text-xl font-bold text-black border-b border-blue-800 mb-3">Current Roles & Permissions</h2>
    <table class="">
        <thead>
            <tr>
                <th></th>
                @foreach($roles as $role)
                <th class="border px-4 py-2 bg-gray-200 font-normal">
                    @livewire("permission-ui::role-actions", ["role" => $role])
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr class="@if($loop->even) bg-gray-100 @endif">
                    <td class="border px-4 py-2 bg-gray-200">@livewire("permission-ui::permission-actions", ["permission" => $permission])</td>
                    @foreach($roles as $role)
                        @foreach(["view", "create", "update", "delete"] as $actions)
                            <td class="border px-4 py-2 text-center">
                                @if($role->hasPermissionTo($permission->name))
                                    <i
                                        wire:loading.class.remove="fa-check cursor-pointer text-green-600"
                                        wire:loading.class="cursor-wait fa-hourglass text-gray-300"
                                        wire:click="togglePermission({{$role->id}},{{$permission->id}})"
                                        class="fa fa-check text-lg font-bold text-green-600 cursor-pointer"></i>
                                @else
                                    <i
                                        wire:loading.class.remove="fa-times cursor-pointer text-red-600"
                                        wire:loading.class="cursor-wait fa-hourglass text-gray-300"
                                        wire:click="togglePermission({{$role->id}},{{$permission->id}})"
                                        class="fa fa-times text-lg font-bold text-red-600 cursor-pointer"></i>
                                @endif
                            </td>
                        @endforeach
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
