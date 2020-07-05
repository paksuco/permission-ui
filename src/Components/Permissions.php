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

    public $useActions;
    public $actions;

    public function mount($page = 1)
    {
        $this->page = $page;
        $this->useActions = config("permission-ui.use_common_actions", false);
        $this->actions = [];

        if ($this->useActions) {
            $this->actions = config("permission-ui.actions", [
                'create' => 'fas fa-plus-circle',
                'read' => 'fas fa-eye',
                'update' => 'fas fa-pencil-alt',
                'delete' => 'fas fa-trash-alt',
            ]);
        }
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
        $firstAction = collect($this->actions)->keys()->first();
        $this->permissionNameSuffixed = $this->permissionname . "-" . $firstAction;

        $this->validate([
            'permissionname' => "required|min:3",
            'permissionNameSuffixed' => "unique:" . config("permission.table_names.permissions") . ",name,NULL,id",
        ]);

        foreach (array_keys($this->actions) as $key) {
            Permission::create(["name" => $this->permissionname . "-" . $key]);
        }

        $this->permissionname = "";
    }

    public function togglePermission($roleId, $permissionId)
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
        $firstAction = collect($this->actions)->keys()->first();
        $permissions = Permission::all();

        $permissionGroups = Permission::where('name', 'like', '%-' . $firstAction)->get()
            ->transform(function ($permission) use ($firstAction) {
                return substr($permission->name, 0, strlen($permission->name) - strlen($firstAction) - 1);
            });

        return view("permission-ui::components.table", [
            "roles" => $roles,
            "permissions" => $permissions,
            "permissionGroups" => $permissionGroups,
        ]);
    }
}
