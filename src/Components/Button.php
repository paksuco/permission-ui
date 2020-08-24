<?php

namespace Paksuco\Permission\Components;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Button extends Component
{
    public $role;
    public $permission;
    public $status;

    public $listeners = ["refreshButton"];

    public function mount($role, $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
        $roleModel = Role::find($role);
        $permissionModel = Permission::find($permission);
        $this->status = $roleModel->hasPermissionTo($permissionModel->name);
    }

    public function togglePermission()
    {
        $roleModel = Role::find($this->role);
        $permissionModel = Permission::find($this->permission);
        if ($roleModel->hasPermissionTo($permissionModel->name)) {
            $roleModel->revokePermissionTo($permissionModel);
            $this->status = false;
        } else {
            $roleModel->givePermissionTo($permissionModel->name);
            $this->status = true;
        }
    }

    public function refreshButton()
    {
        $roleModel = Role::find($this->role);
        $permissionModel = Permission::find($this->permission);
        $this->status = $roleModel->hasPermissionTo($permissionModel->name);
    }

    public function getKey()
    {
        return "button-" . $this->role . "-" . $this->permission;
    }

    public function render()
    {
        return view("permission-ui::components.theme-" . config("permission-ui.theme") . ".partials.button");
    }
}
