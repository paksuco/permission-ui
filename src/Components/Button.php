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
        $buttonRole = Role::find($role);
        $buttonPermission = Permission::find($permission);
        $this->status = $buttonRole->hasPermissionTo($buttonPermission->name);
    }

    public function togglePermission()
    {
        $buttonRole = Role::find($this->role);
        $buttonPermission = Permission::find($this->permission);
        if ($buttonRole->hasPermissionTo($buttonPermission->name)) {
            $buttonRole->revokePermissionTo($buttonPermission);
            $this->status = false;
        } else {
            $buttonRole->givePermissionTo($buttonPermission->name);
            $this->status = true;
        }
    }

    public function refreshButton()
    {
        $buttonRole = Role::find($this->role);
        $buttonPermission = Permission::find($this->permission);
        $this->status = $buttonRole->hasPermissionTo($buttonPermission->name);
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
