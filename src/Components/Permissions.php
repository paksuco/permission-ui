<?php

namespace Paksuco\Permission\Components;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{
    public $page;

    public $rolename;
    public $permissionname;

    public function mount($page = 1)
    {
        $this->page = $page;
    }

    public function saveNewRole()
    {
        $this->validate([
            'rolename' => "required|min:3|unique:" . config("permission.table_names.roles") . ",name,NULL,id",
        ]);

        Role::create(["name" => $this->rolename]);
        $this->rolename = "";
    }

    public function saveNewPermission()
    {
        $this->validate([
            'permissionname' => "required|min:3|unique:" . config("permission.table_names.permissions") . ",name,NULL,id",
        ]);

        Permission::create(["name" => $this->permissionname]);
        $this->permissionname = "";
    }

    public function togglePermission($roleId, $permissionId, $state)
    {
        $role = Role::findOrFail($roleId);
        $permission = Permission::findOrFail($permissionId);

        if ($role->hasPermissionTo($permission->name)) {
            $role->revokePermissionTo($permission->name);
        } else {
            $role->givePermissionTo($permission->name);
        }
    }

    public function render()
    {
        $roles = Role::with("permissions")->get();
        $permissions = Permission::all();
        return view("permission-ui::components.table", ["roles" => $roles, "permissions" => $permissions]);
    }
}
