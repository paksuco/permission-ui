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
        $this->role = $role;
        $this->name = $role->name;
    }

    public function updateRole()
    {
        if ($this->name === $this->role->name) {
            return;
        }

        $this->resetErrorBag();
        $this->resetValidation();
        $buffered = $this->name;
        $this->name = $this->role->name;
        Validator::make(["name" => $buffered], ["name" => "required|filled|unique:roles,name," . $this->role->id . ",id"], [], ["name" => "role name"])->validate();
        $this->role->name = $buffered;
        $this->name = $buffered;
        $this->role->save();
        $this->emit("refreshMappings");
    }

    public function allowAll()
    {
        $this->role->givePermissionTo(Permission::all());
        $this->emit("refreshMappings");
    }

    public function disallowAll()
    {
        $this->role->revokePermissionTo(Permission::all());
        $this->emit("refreshMappings");
    }

    public function deleteRole()
    {
        $this->role->delete();
        $this->emit("refreshMappings");
    }

    public function render()
    {
        return view("permission-ui::components.theme-".config("permission-ui.theme").".partials.role-actions", ["role" => $this->role]);
    }
}
