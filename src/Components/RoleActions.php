<?php

namespace Paksuco\Permission\Components;

use Livewire\Component;
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
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate(["name" => "required|filled|unique:roles,name,".$this->role->id.",id"], [], ["name" => "role name"]);
        $this->role->name = $this->name;
        $this->role->save();
    }

    public function deleteRole()
    {
        $this->emitUp("deleteRole", $this->role->id);
    }

    public function render()
    {
        return view("permission-ui::components.partials.role-actions", ["role" => $this->role]);
    }
}
