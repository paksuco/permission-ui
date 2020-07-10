@if($role->hasPermissionTo($permission->name))
<i class="bg-green-500 subpixel-antialiased p-2 rounded-lg fa fa-check
    text-lg font-bold text-white cursor-pointer"
    wire:click="togglePermission({{$role->id}}, {{$permission->id}})"></i>
@else
<i class="bg-red-600 subpixel-antialiased p-2 rounded-lg fa fa-ban
    text-lg font-bold text-white cursor-pointer"
    wire:click="togglePermission({{$role->id}}, {{$permission->id}})"></i>
@endif
