<?php

namespace Paksuco\Permission\Components;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleActions extends Component
{
    public $role;

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function render()
    {
        return view("permission-ui::components.role-actions", ["role" => $this->role]);
    }
}
