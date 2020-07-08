<?php

namespace Paksuco\Permission\Components;

use Livewire\Component;

class PermissionActions extends Component
{
    public $permission;

    public function mount($permission)
    {
        $this->permission = $permission;
    }

    public function render()
    {
        return view(
            "permission-ui::components.partials.permission-actions",
            ["permission" => $this->permission]
        );
    }
}
