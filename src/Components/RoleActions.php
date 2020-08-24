<?php

namespace Paksuco\Permission\Components;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleActions extends Component
{
    public $role;

    public $name;

    public function mount(Role $role)
    {
        $this->role = $role->id;
        $this->name = $role->name;
    }

    public function updateRole()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $role = Role::find($this->role);
        if ($this->name === $role->name) {
            $this->emitUp("refreshMappings");
            return;
        }
        $buffered = $this->name;
        $this->name = $role->name;
        Validator::make(
            [
                "name" => $buffered
            ],
            [
                "name" => "required|filled|unique:roles,name," . $role->id . ",id"
            ],
            [],
            [
                "name" => "role name"
            ]
        )->validate();
        $role->name = $buffered;
        $this->name = $buffered;
        $role->save();
        $this->emitUp("refreshMappings");
    }

    public function deleteRole()
    {
        $this->emitUp("deleteRole", ["id" => $this->role]);
    }

    public function allowAll()
    {
        $role = Role::find($this->role);
        $role->givePermissionTo(Permission::all());
        $this->emitUp("refreshMappings");
    }

    public function disallowAll()
    {
        $role = Role::find($this->role);
        $role->revokePermissionTo(Permission::all());
        $this->emitUp("refreshMappings");
    }

    public function render()
    {
        $role = Role::find($this->role);
        return view("permission-ui::components.theme-" . config("permission-ui.theme") . ".partials.role-actions", ["roleModel" => $role]);
    }
}
